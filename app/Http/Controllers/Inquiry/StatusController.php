<?php

namespace App\Http\Controllers\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\ChangeStatusRequest;
use App\Http\Resources\Inquiry\InquiryResource;
use App\Interfaces\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class StatusController extends Controller
{
    public function __construct(protected InquiryRepositoryInterface $inquiryRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return InquiryResource
     */
    public function index(Inquiry $inquiry)
    {
        $inquiry->load([
            'statuses.creator',
        ]);

        return new InquiryResource($inquiry);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Change specified inquiry status.
     *
     * @param Inquiry $inquiry
     * @param ChangeStatusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Inquiry $inquiry, ChangeStatusRequest $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->inquiryRepository->changeStatus($inquiry, $request->all());

        $message = trans('messages.inquiries.change_status.success');
        $statusCode = Response::HTTP_ACCEPTED;

        if ($result instanceof \Exception) {
            Log::channel('inquiries')
                ->error($result);

            $message =trans('messages.inquiries.change_status.failed');
            $statusCode =  Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json(['message' => $message], $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
