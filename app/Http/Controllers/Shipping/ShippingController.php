<?php

namespace App\Http\Controllers\Shipping;

use App\Enums\CommentTypesEnum;
use App\Enums\RolesEnum;
use App\Enums\ShippingStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\StoreCommentRequest;
use App\Http\Requests\Shipping\StoreShippingRequest;
use App\Http\Requests\Shipping\UpdateShippingRequest;
use App\Http\Resources\Shipping\ShippingCollection;
use App\Http\Resources\Shipping\ShippingResource;
use App\Http\Services\File\FileService;
use App\Models\Files;
use App\Models\Inquiry;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ShippingController extends Controller
{
    // public function __construct(protected ShippingRepositoryInterface $shippingRepository)
    // {
    // }

    /**
     * Display a listing of the resource.
     *
     * @return ShippingCollection
     */
    public function index(Request $request)
    {
        $filters = $request->all();

        $shippings = Shipping::withCount('boxes')
            ->when(isset($filters['status']), function ($query) use ($filters) {
                $query->where('status', $filters['status']);
            })
            ->when(isset($filters['captain_info']), function ($query) use ($filters) {
                $query->where('captain_info', 'like', "%{$filters['captain_info']}%");
            })
            ->when(isset($filters['agent_name']), function ($query) use ($filters) {
                $query->where('agent_name', 'like', "%{$filters['agent_name']}%");
            })
            ->when(isset($filters['agent_no']), function ($query) use ($filters) {
                $query->where('agent_no', 'like', "%{$filters['agent_no']}%");
            })
            ->get();


        return view('pages/manager/shipping/shipping', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/manager/shipping/add-shipping');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreShippingRequest $request, FileService $fileService)
    {
        $shippingData = $request->all();
        DB::beginTransaction();

        try {
            $shipping = Shipping::create([
                'captain_info' => $shippingData['captain_info'],
                'agent_name' => $shippingData['agent_name'],
                'agent_no' => $shippingData['agent_no'],
                'sign' => $shippingData['sign'],
                'handed_over_date' => $shippingData['handed_over_date'],
                'created_by' => Auth::id(),
                'status' => ShippingStatusEnum::PREPARING->value
            ]);

            // $shipping->setStatus($shippingData['status']);

            if (isset($shippingData['delivery_doc'])) {
                $doc = $shippingData['delivery_doc'];

                $fileService->setExclusiveDirectory('app' . DIRECTORY_SEPARATOR . 'shipping');
                $fileService->setFileSize($doc);
                $fileSize = $fileService->getFileSize();
                // $result = $fileService->moveToPublic($doc);
                $path = $fileService->moveToStorage($doc);
                $fileFormat = $fileService->getFileFormat();

                if ($path === false) {
                    return redirect()->back()->with('error', 'There was an error uploading the docs');
                }
                $shipping->file()->create([
                    'url' => $path,
                    'name' => $doc->getClientOriginalName(),
                    'size' => $fileSize,
                    'created_by' => Auth::id(),
                ]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return redirect()->route('shipping.edit', [$shipping->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Shipping $shipping
     * @return ShippingResource
     */
    public function show(Shipping $shipping)
    {
        $shipping->load([
            'boxes.client:id,first_name,last_name',
            'boxes.creator:id,first_name,last_name',
            'comments'
        ])
            ->loadCount('boxes');

        // return new ShippingResource($shipping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        $shipping->load([
            'comments',
            'comments.creator',
        ]);
        $clients =  User::whereHas('roles', function ($query) {
            return $query->whereIn('name', [RolesEnum::CLIENT->value]);
        })->get();

        $inquiries =  Inquiry::all();

        return view('pages/manager/shipping/add-shipping', compact('shipping', 'clients', 'inquiries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping, FileService $fileService)
    {
        DB::beginTransaction();

        $shippingData = $request->all();

        try {
            $shipping->update([
                'captain_info' => $shippingData['captain_info'],
                'agent_name' => $shippingData['agent_name'],
                'agent_no' => $shippingData['agent_no'],
                'sign' => $shippingData['sign'],
                'handed_over_date' => $shippingData['handed_over_date'],
                'status' => $shippingData['status']
            ]);

            if (isset($shippingData['delivery_doc'])) {
                $doc = $shippingData['delivery_doc'];

                $fileService->setExclusiveDirectory('app' . DIRECTORY_SEPARATOR . 'shipping');
                $fileService->setFileSize($doc);
                $fileSize = $fileService->getFileSize();
                // $result = $fileService->moveToPublic($doc);
                $path = $fileService->moveToStorage($doc);
                $fileFormat = $fileService->getFileFormat();

                if ($path === false) {
                    return redirect()->back()->with('error', 'There was an error uploading the docs');
                }
                $shipping->deleteFiles();

                $shipping->file()->create([
                    'url' => $path,
                    'name' => $doc->getClientOriginalName(),
                    'size' => $fileSize,
                    'created_by' => Auth::id(),
                ]);
            }

        } catch (\Exception $exception) {
            DB::rollBack();
        }

        DB::commit();


        return redirect()->back();
    }

    public function addComment(Shipping $shipping, StoreCommentRequest $request)
    {
        $inputs = $request->all();
        $shipping->comments()->create([
            ...$inputs,
            'created_by' => Auth::id(),
            'type' =>  CommentTypesEnum::COMMENT->value
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
