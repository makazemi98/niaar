<?php

namespace App\Http\Controllers\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\FutureDue\StoreFutureDueRequest;
use App\Http\Requests\FutureDue\UpdateFutureDueRequest;
use App\Http\Resources\Inquiry\InquiryResource;
use App\Interfaces\Repositories\FutureDueRepositoryInterface;
use App\Models\FutureDue;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FutureDueController extends Controller
{
    public function __construct(protected FutureDueRepositoryInterface $futureDueRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Inquiry $inquiry
     * @return InquiryResource
     */
    public function index(Inquiry $inquiry)
    {
        $inquiry->load([
            'futureDues',
            'client:id,first_name,last_name'
        ]);

        return new InquiryResource($inquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Inquiry $inquiry
     * @param StoreFutureDueRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Inquiry $inquiry, StoreFutureDueRequest $request)
    {
        $result = $this->futureDueRepository->storeFutureDue($inquiry, $request->all());

        if ($result instanceof \Exception) {
            Log::channel('future_dues')->error($result);

            return response()->json(
                [
                    'message' => trans('messages.inquiries.future_dues.store.failed')
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return ( new InquiryResource($result) )
            ->additional([
                'message' => trans('messages.inquiries.future_dues.store.success')
            ])
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFutureDueRequest $request
     * @param Inquiry $inquiry
     * @param FutureDue $futureDue
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFutureDueRequest $request, Inquiry $inquiry, FutureDue $futureDue)
    {
        abort_if($futureDue->inquiry_id !== $inquiry->id, Response::HTTP_FORBIDDEN);

        $result = $this->futureDueRepository->updateFutureDues($inquiry, $futureDue, $request->all());

        if ($result instanceof \Exception) {
            Log::channel('calculations')->error($result);

            return response()->json(
                [
                    'message' => trans('messages.inquiries.future_dues.update.failed')
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return ( new InquiryResource($result) )
            ->additional([
                'message' => trans('messages.inquiries.future_dues.update.success')
            ])
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inquiry $inquiry
     * @param FutureDue $futureDue
     * @return InquiryResource
     */
    public function destroy(Inquiry $inquiry, FutureDue $futureDue)
    {
        abort_if($futureDue->inquiry_id !== $inquiry->id, Response::HTTP_FORBIDDEN);

        $futureDue->delete();

        $inquiry->load(['futureDues']);

        return new InquiryResource($inquiry);
    }

    /**
     * Change future dues payment status
     *
     * @param Inquiry $inquiry
     * @param FutureDue $futureDue
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentStatus(Inquiry $inquiry, FutureDue $futureDue, Request $request)
    {
        $request->validate([
            'is_paid' => ['required', 'boolean']
        ]);

        if ($futureDue->inquiry_id == $inquiry->id) {
            $message = trans('messages.inquiries.future_dues.payment_status.success');

            $statusCode = Response::HTTP_ACCEPTED;

            $futureDue->update([
                'is_paid' => $request->input('is_paid')
            ]);
        } else {
            $message = trans('messages.inquiries.future_dues.payment_status.not_allowed');

            $statusCode = Response::HTTP_BAD_REQUEST;
        }

        return response()->json(['message' => $message], $statusCode);
    }
}
