<?php

namespace App\Http\Controllers\User;

use App\Enums\InquiryStatusesEnum;
use App\Enums\PaymentTabsEnum;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Services\Image\ImageService;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\Inquiry;
// use App\Models\Payment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

use function __;
use function response;
use function trans;

class UserController extends Controller
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
        $this->setDestroyMiddleware();
    }

    protected function setDestroyMiddleware()
    {
        $canDeleteUser = implode('|', [
            RolesEnum::MANAGER->value,
            RolesEnum::TEAM_LEADER->value
        ]);

        $this->middleware("role:{$canDeleteUser}")->only('destroy');
    }

    public function teamMembers()
    {
        $users =  User::whereHas('roles', function ($query) {
            return $query->whereNotIn('name', [RolesEnum::CLIENT->value]);
        })->get();

        return view('pages.manager.teamMembers.index', compact('users'));
    }


    public function createTeamMembers()
    {
        return view('pages.manager.teamMembers.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return UserCollection
     */
    public function getClient(Request $request)
    {
        $users = User::with("roles")->whereHas("roles", function ($role) {
            $role->where('name', RolesEnum::CLIENT->value);
        })->get();

        $filters = $request->toArray();
        $users = User::withCount($this->makeCountQueryArray())
            ->whereHas('roles', function ($query) use ($filters) {
                $query->whereIn('name', [RolesEnum::CLIENT->value]);
            })
            ->when(isset($filters['name']), function ($query) use ($filters) {
                $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'LIKE', "%{$filters['name']}%");
            })
            ->when(
                isset($filters['from_created_at']) && !isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '>=', $filters['from_created_at']);
                }
            )
            ->when(
                !isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '<=', $filters['to_created_at']);
                }
            )
            ->when(
                isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereBetween(
                        'created_at',
                        [
                            $filters['from_created_at'],
                            $filters['to_created_at']
                        ]
                    );
                }
            )
            ->orderBy('id', isset($filters['order']) && $filters['order'] !== '0' ? 'desc' : 'desc');

        $result = $users->get();
        // dd($users);
        return view('pages.manager.client.index', compact('result'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return UserCollection
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->list([]);

        // return new UserCollection($users);
    }

    public function makeCountQueryArray(): array
    {

        $q = ['assignedToInquiries as all_inquiries_count'];

        foreach (InquiryStatusesEnum::cases() as $status) {
            $q['assignedToInquiries as ' . $status->value] = function ($query) use ($status) {
                $query->currentStatus($status->value);
            };
        }

        // dd($q);
        // dd(User::withCount($q));
        return $q;
    }
    /**
     * Get team member list
     *
     * @param Request $request
     * @return UserCollection
     */
    public function getTeamMembers(Request $request)
    {
        $filters = $request->toArray();
        $users = User::withCount($this->makeCountQueryArray())
            ->whereHas('roles', function ($query) use ($filters) {
                if (isset($filters['role'])) {
                    $query->where('name', $filters['role']);
                }
                $query->whereNotIn('name', [RolesEnum::CLIENT->value, RolesEnum::MANAGER->value]);
            })
            ->when(isset($filters['name']), function ($query) use ($filters) {
                $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'LIKE', "%{$filters['name']}%");
            })
            ->when(
                isset($filters['from_created_at']) && !isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '>=', $filters['from_created_at']);
                }
            )
            ->when(
                !isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '<=', $filters['to_created_at']);
                }
            )
            ->when(
                isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereBetween(
                        'created_at',
                        [
                            $filters['from_created_at'],
                            $filters['to_created_at']
                        ]
                    );
                }
            )
            ->orderBy('id', isset($filters['order']) && $filters['order'] !== '0' ? 'desc' : 'desc');

        $result = $users->get();
        return view('pages.manager.teamMembers.index', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse | UserResource
     */
    public function storeCustomer(StoreUserRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $inputs['first_name'] = $inputs['firstName'];
        $inputs['last_name'] = $inputs['lastName'];
        $inputs['role'] = RolesEnum::CLIENT->value;

        DB::beginTransaction();

        try {
            if (!in_array($inputs['role'], RolesEnum::values())) {
                return redirect()->back()->with('error', 'role not found!');
            }
            if ($request->hasFile('avatar')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users-avatar');
                $result = $imageService->fitAndSave($request->file('avatar'), 120, 120);
                if ($result === false) {
                    return redirect()->back()->with('error', 'There was an error uploading the photo');
                }
                $inputs['avatar'] = $result;
            }

            $user = $this->userRepository->storeUser($inputs);
            $user->assignRole($inputs['role']);
        } catch (\Throwable $exception) {
            DB::rollBack();
            // dd($exception);
            return $exception;
            // return redirect()->back()->with('error', 'something went wrong!');
        }
        DB::commit();

        return redirect()->route('manager.clients')->with('success', 'user Created');
    }




    public function createClients()
    {
        return view('pages.manager.client.create');
    }


    public function profile(User $user)
    {
        return view('pages.manager.profile.profile', compact('user'));
    }

    public function editProfile(User $user)
    {
        return view('pages.manager.profile.edit-profile', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse | UserResource
     */
    public function store(StoreUserRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $inputs['first_name'] = $inputs['firstName'];
        $inputs['last_name'] = $inputs['lastName'];
        DB::beginTransaction();

        try {
            if (!in_array($inputs['role'], RolesEnum::values())) {
                return redirect()->back()->with('error', 'role not found!');
            }
            if ($request->hasFile('avatar')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users-avatar');
                $result = $imageService->fitAndSave($request->file('avatar'), 120, 120);
                if ($result === false) {
                    return redirect()->back()->with('error', 'There was an error uploading the photo');
                }
                $inputs['avatar'] = $result;
            }

            $user = $this->userRepository->storeUser($inputs);
            $user->assignRole($inputs['role']);
        } catch (\Throwable $exception) {
            DB::rollBack();
            // dd($exception);
            return $exception;
            // return redirect()->back()->with('error', 'something went wrong!');
        }
        DB::commit();

        return redirect()->route('manager.team.members')->with('success', 'user Created');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        if ($user->getRoleNames()->first() == RolesEnum::CLIENT->value) {
            $user->load('confidential');
        }

        // return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user, ImageService $imageService)
    {
        $userData = $request->all();
        DB::beginTransaction();

        try {
            $user->update([
                'title' => $userData['title'] ?? null,
                'first_name' => $userData['first_name'],
                'abbreviation' => $userData['abbreviation'] ?? null,
                'last_name' => $userData['last_name'],
                'email' => strtolower($userData['email']),
                'gender' => $userData['gender'],
                'renewal_date' => $userData['renewal_date'] ?? null,
                'contact_person' => $userData['contact_person'] ?? null,
                'mobile_number' => $userData['mobile_number'] ?? null,
                'company_name' => $userData['company_name'] ?? null,
                'company_number' => $userData['company_number'] ?? null,
                'contact_name_2' => $userData['contact_name_2'] ?? null,
                'mobile_number_2' => $userData['mobile_number_2'] ?? null,
                'company_abbreviation' => $userData['company_abbreviation'] ?? null,
                'cofidential' => $userData['cofidential'] ?? null,

            ]);

            // $user->syncRoles($userData['role']);

            if (isset($userData['avatar'])) {
                // $user->update([
                //     'password' => bcrypt($userData['password'])
                // ]);
            }
            if ($request->hasFile('avatar')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users-avatar');
                $result = $imageService->fitAndSave($request->file('avatar'), 120, 120);
                if ($result === false) {
                    return redirect()->back()->with('error', 'There was an error uploading the photo');
                }
                $user->update([
                    'avatar' => $result
                ]);
            }

            if (isset($userData['password'])) {
                $user->update([
                    'password' => bcrypt($userData['password'])
                ]);
            }

            // if ($userData['role'] == RolesEnum::CLIENT->value && isset($userData['confidential'])) {
            //     $user->confidential()->updateOrCreate([
            //         'body' => $userData['confidential'],
            //         'created_by' => Auth::id()
            //     ]);
            // }

            // $user->load('confidential');

            $user->refresh();
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        // $user->loadCount([
        //     'assignedToInquiries' => function ($query) {
        //         $query->currentStatus(InquiryStatusesEnum::ON_PROGRESS->value);
        //     }
        // ]);

        // if ($user->assigned_to_inquiries_count > 0) {
        //     $message = trans('messages.users.delete.failed');
        //     $statusCode = Response::HTTP_NOT_ACCEPTABLE;
        // } else {
        //     $message = trans('messages.users.delete.success');
        //     $statusCode = Response::HTTP_OK;

        //     $user->delete();
        // }

        // return response()->json(
        //     [
        //         'message' => $message
        //     ],
        //     $statusCode
        // );
    }

    public function responseTime(User $user)
    {
        return $user->average_response_time;
    }

    public function getAverageResponseTimeByRole(Request $request)
    {
        $roles = [RolesEnum::ACCOUNTANT->value, RolesEnum::TEAM_LEADER->value];

        $result = [];

        foreach ($roles as $role) {
            $avgResponseTimes = User::role($role)
                ->get()
                ->transform(function ($item) {
                    $item['average_response_time'] = $item->average_response_time;

                    return $item;
                })
                ->pluck('average_response_time');

            if ($avgResponseTimes->count() <= 0) {
                $result[$role] = [
                    'days' => 0,
                    'hours' => 0,
                    'minutes' => 0,
                ];

                break;
            }

            $sumOfDays = $avgResponseTimes->sum('days');
            $sumOfHours = $avgResponseTimes->sum('hours');
            $sumOfMinutes = $avgResponseTimes->sum('minutes');

            $daysInMinutes = $sumOfDays * 24 * 60;
            $hoursInMinutes = $sumOfHours * 60;

            $totalMinutes = ceil(
                ($daysInMinutes + $hoursInMinutes + $sumOfMinutes) / $avgResponseTimes->count()
            );

            $avgTime = explode(' ', gmdate('d H i', ($totalMinutes)));

            $result[$role] = [
                'days' => $avgTime[0] - 1,
                'hours' => (int) $avgTime[1],
                'minutes' => (int) $avgTime[2]
            ];
        }

        return view('pages.manager.dashboard.response-time', compact('result'));
    }

    public function pendingTasks(Request $request)
    {
        $userRole = Auth::user()->getRoleNames()->first();
        // dd($userRole,in_array($userRole, [RolesEnum::MANAGER->value]));

        if (in_array($userRole, [RolesEnum::MANAGER->value])) {
            $avg = DB::table('question_response_time')
                ->where('questioner', Auth::id())
                ->count();
            // $teamMembers = $this->userRepository->getTeamMembers($request->all());

            // return new UserCollection($teamMembers);
        }


        if ($userRole === RolesEnum::CLIENT->value) {
            $askedQuestion = DB::table('question_response_time')
                ->where('questioner', Auth::id())
                ->count();

            $quoted = Inquiry::currentStatus(InquiryStatusesEnum::QUOTED->value)
                ->where('client_id', Auth::id())
                ->count();

            return [
                'asked_question' => $askedQuestion,
                'quoted' => $quoted,
                'pending_payment' => $pendingPayment->pending_payment
            ];
        }

        if ($userRole === RolesEnum::PROCUREMENT->value) {
            $assigned = Inquiry::where('assigned_to', Auth::id())->count();

            $answeredQuestions = DB::table('question_response_time')
                ->where([
                    'questioned' => Auth::id(),
                    ['replayed_in', '!=', null]
                ])
                ->count();

            $paid = Inquiry::whereHas('statuses', function ($query) {
                $query->where('name', InquiryStatusesEnum::PAID->value);
            })
                ->where('assigned_to', Auth::id())
                ->count();

            return  [
                'assigned' => $assigned,
                'answered_questions' => $answeredQuestions,
                'paid' => $paid
            ];
        }

        if ($userRole === RolesEnum::TEAM_LEADER->value) {
            $procurementIds = User::select('id')->role(RolesEnum::PROCUREMENT->value)->pluck('id')->toArray();

            $assigned = Inquiry::whereIn('assigned_to', $procurementIds)
                ->count();

            $answeredQuestions = DB::table('question_response_time')
                ->whereIn('questioner', $procurementIds)
                ->count();

            $paid = Inquiry::whereHas('statuses', function ($query) {
                $query->where('name', InquiryStatusesEnum::PAID->value);
            })
                ->whereIn('assigned_to', $procurementIds)
                ->count();

            // return  [
            //     RolesEnum::PROCUREMENT->value => [
            //         'assigned' => $assigned,
            //         'answered_questions' => $answeredQuestions,
            //         'paid' => $paid
            //     ],
            //     RolesEnum::ACCOUNTANT->value => [
            //         InquiryStatusesEnum::QUOTATION_PREPARED->value
            //         => Inquiry::currentStatus(InquiryStatusesEnum::QUOTATION_PREPARED->value)->count(),
            //         InquiryStatusesEnum::APPROVED->value
            //         => Inquiry::currentStatus(InquiryStatusesEnum::APPROVED->value)->count(),
            //         InquiryStatusesEnum::DELIVERED->value
            //         => Inquiry::currentStatus(InquiryStatusesEnum::DELIVERED->value)->count(),
            //     ]
            // ];
        }
    }

    public function statistics(User $user)
    {
        $businessMade = Inquiry::currentStatus(InquiryStatusesEnum::profitable())
            ->withSum('calculations', 'actual_ordered_price_aed')
            ->where('client_id', $user->id)
            ->get()
            ->sum('calculations_sum_actual_ordered_price_aed');

        return [
            'order_ratio' => $user->order_ratio,
            'pending_quotations' => $user->quoted_inquiries,
            'balance' => $user->balance,
            'business_made' => $businessMade
        ];
    }
}
