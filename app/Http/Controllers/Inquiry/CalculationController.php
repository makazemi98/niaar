<?php

namespace App\Http\Controllers\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\Calculation\StoreCalculationRequest;
use App\Http\Requests\Calculation\UpdateCalculationRequest;
use App\Http\Resources\Inquiry\InquiryResource;
use App\Interfaces\Repositories\CalculationRepositoryInterface;
use App\Models\Calculation;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CalculationController extends Controller
{
    protected $inquiry;

    public function __construct(protected CalculationRepositoryInterface $calculationRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Inquiry $inquiry
     * @return InquiryResource
     */
    public function index(Inquiry $inquiry, Request $request)
    {
        $inquiry->load([
            'client.confidential',
            'calculations' => function ($query) use($request) {
                $query->with(['remark', 'supplier'])
                    ->when($request->input('is_extra', null) == 1, function ($query) {
                        $query->where('is_extra', 1);
                    })
                    ->when(!$request->has('is_extra'), function ($query) {
                        $query->where('is_extra', 0);
                    });
            }
        ]);

        return new InquiryResource($inquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Inquiry $inquiry, StoreCalculationRequest $request)
    {
        $result = $this->calculationRepository->storeCalculation($inquiry, $request->all());

        if ($result instanceof \Exception) {
            Log::channel('calculations')->error($result);

            return response()->json(
                [
                    'message' => trans('messages.inquiries.calculations.store.failed')
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return ( new InquiryResource($result) )
            ->additional([
                'message' => trans('messages.inquiries.calculations.store.success')
            ])
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCalculationRequest $request
     * @param Inquiry $inquiry
     * @param Calculation $calculation
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCalculationRequest $request, Inquiry $inquiry, Calculation $calculation)
    {
        abort_if($calculation->inquiry_id !== $inquiry->id, Response::HTTP_FORBIDDEN);

        $result = $this->calculationRepository->updateCalculation($inquiry, $calculation, $request->all());

        if ($result instanceof \Exception) {
            Log::channel('calculations')->error($result);

            return response()->json(
                [
                    'message' => trans('messages.inquiries.calculations.update.failed')
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return ( new InquiryResource($result) )
            ->additional([
                'message' => trans('messages.inquiries.calculations.update.success')
            ])
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inquiry $inquiry
     * @param Calculation $calculation
     * @return InquiryResource
     */
    public function destroy(Inquiry $inquiry, Calculation $calculation)
    {
        abort_if($calculation->inquiry_id !== $inquiry->id, Response::HTTP_FORBIDDEN);

        $calculation->delete();

        $inquiry->load(['calculations.remark', 'calculations.supplier']);

        return new InquiryResource($inquiry);
    }
}
