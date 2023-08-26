<?php

namespace App\Repositories;

use App\Enums\InquiryStatusesEnum;
use App\Enums\RolesEnum;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(User::class);
    }


    /**
     * @param array $filters
     * @return Collection
     */
    public function getUsers(RolesEnum $role)
    {
        $users = $this->model->where('role', $role)->get();
        return $users;
    }

    /**
     * @param array $filters
     * @return Collection
     */
    public function list(array $filters)
    {
        // todo: list and getTeamMembers are same and can be merged
        $users = $this->model
            ->with('roles')
            ->withCount($this->makeCountQueryArray())
            ->when(isset($filters['role']), function ($query) use ($filters) {
                $query->role($filters['role']);
            })
            ->when(isset($filters['abbreviation']), function ($query) use ($filters) {
                $query->where('abbreviation', $filters['abbreviation']);
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
            ->orderBy('id', $filters['order'] ?? 'desc');

        if (isset($filters['per_page'])) {
            $result = $users->paginate($filters['per_page']);
        } else {
            $result = $users->get();
        }

        return $result;
    }

    /**
     * Get team members with inquiry stats
     *
     * @param array $filters
     * @return LengthAwarePaginator | Collection
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getTeamMembers(array $filters): LengthAwarePaginator|Collection
    {
        $users = $this->model
            ->withCount($this->makeCountQueryArray())
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
            ->orderBy('id', $filters['order'] ?? 'desc');


        if (isset($filters['per_page'])) {
            $result = $users->paginate($filters['per_page']);
        } else {
            $result = $users->get();
        }

        return $result;
    }

    /**
     * @return string[]
     */
    public function makeCountQueryArray(): array
    {
        $q = ['assignedToInquiries as all_inquiries_count'];

        foreach (InquiryStatusesEnum::cases() as $status) {
            $q['assignedToInquiries as ' . $status->value] = function ($query) use ($status) {
                $query->currentStatus($status->value);
            };
        }

        return $q;
    }

    /**
     * Store new user resource
     *
     * @param array $userData
     * @return Exception | User
     */
    public function storeUser(array $userData): User|Exception
    {
        DB::beginTransaction();

        try {
            $user = $this->store([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'abbreviation' => $userData['abbreviation'] ?? null,
                'email' => strtolower($userData['email']),
                'role' => $userData['role'],
                'gender' => $userData['gender'],
                'password' => bcrypt($userData['password']),
                'renewal_date' => $userData['renewal_date'] ?? null,
                'avatar' => $userData['avatar'] ?? null,
                'contact_person' => $userData['contact_person'] ?? null,
                'mobile_number' => $userData['mobile_number'] ?? null,
                'company_name' => $userData['company_name'] ?? null,
                'company_number' => $userData['company_number'] ?? null,
                'contact_name_2' => $userData['contact_name_2'] ?? null,
                'mobile_number_2' => $userData['mobile_number_2'] ?? null,
                'company_abbreviation' => $userData['company_abbreviation'] ?? null,
                'cofidential' => $userData['cofidential'] ?? null,

            ]);
        } catch (\Exception $exc) {
            DB::rollBack();
            return $exc;
        }

        DB::commit();

        return $user;
    }

    /**
     * Update the specified user resource
     *
     * @param User $user
     * @param array $userData
     * @return \Exception | User
     */
    public function updateUser(User $user, array $userData): \Exception|User
    {
        DB::beginTransaction();

        try {
            $user->update([
                'title' => $userData['title'],
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

            ]);

            $user->syncRoles($userData['role']);

            if (isset($userData['avatar'])) {
                $user->clearMediaCollection('avatar');

                $path = Storage::putFileAs(
                    "",
                    $userData['avatar'],
                    $userData['avatar']->getClientOriginalName()
                );

                $user->addMediaFromDisk($path)->toMediaCollection('avatar');
            }

            if (isset($userData['password'])) {
                $user->update([
                    'password' => bcrypt($userData['password'])
                ]);
            }

            if ($userData['role'] == RolesEnum::CLIENT->value && isset($userData['confidential'])) {
                $user->confidential()->updateOrCreate([
                    'body' => $userData['confidential'],
                    'created_by' => Auth::id()
                ]);
            }

            $user->load('confidential');

            $user->refresh();
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception;
        }

        DB::commit();

        return $user;
    }
}
