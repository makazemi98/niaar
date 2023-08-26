<?php

namespace App\Http\Controllers\Inquiry;

use App\Enums\InquiryDocsCollectionEnum;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inquiry\UploadDocRequest;
use App\Http\Resources\Inquiry\InquiryResource;
use App\Interfaces\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    public function __construct(protected InquiryRepositoryInterface $inquiryRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Inquiry $inquiry
     * @param $collectionName
     * @return InquiryResource
     */
    public function index(Inquiry $inquiry, $collectionName)
    {
        abort_if(
            $collectionName == InquiryDocsCollectionEnum::CONFIDENTIAL->value &&
            Auth::user()->getRoleNames()->first() == RolesEnum::CLIENT->value,
            Response::HTTP_UNAUTHORIZED,
            'This action is unauthorized.'
        );

        $inquiry->load([
            'media' => function ($query) use($collectionName) {
                $query->where('collection_name', $collectionName);
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
    public function store(Inquiry $inquiry, UploadDocRequest $request)
    {
        $result = $this->inquiryRepository->uploadDoc($inquiry, $request->all());

        if ($result instanceof \Exception) {
            Log::channel('inquiries')
                ->error($result);

            return response()->json(
                [
                    'message' => trans("messages.inquiries.upload_doc.failed")
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return ( new InquiryResource($result) )
            ->additional([
                'message' => trans("messages.inquiries.upload_doc.success")
            ])
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inquiry $inquiry
     * @param Media $media
     * @return InquiryResource
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted
     */
    public function destroy(Inquiry $inquiry, Media $media)
    {
        abort_if(
            $media->collection_name == InquiryDocsCollectionEnum::CONFIDENTIAL->value &&
            Auth::user()->getRoleNames()->first() == RolesEnum::CLIENT->value,
            Response::HTTP_UNAUTHORIZED,
            'This action is unauthorized.'
        );

        if (
            $media->model_type == get_class($inquiry) &&
            $media->model_id == $inquiry->id
        ) {
            $media->delete();
        }

        $inquiry->load('media');

        return new InquiryResource($inquiry);
    }
}
