<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shipping\StoreCommentRequest;
use App\Http\Requests\Shipping\UpdateCommentRequest;
use App\Http\Resources\Shipping\ShippingResource;
use App\Models\Comment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Shipping $shipping, StoreCommentRequest $request)
    {
        try {

            $shipping->comments()->create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'created_by' => Auth::id()
            ]);

            $statusCode = Response::HTTP_CREATED;

            $message = trans('messages.shipping.comments.store.success');

            $shipping->load(['boxes', 'comments.creator'])
                ->loadCount('boxes as total_boxes')
                ->loadSum('boxes as total_volume', 'volume');

        } catch (\Exception $exception) {
            Log::channel('shipping')->error($exception);

            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

            $message = trans('messages.shipping.comments.store.failed');
        }

        return ( new ShippingResource($shipping) )
            ->additional([
                'message' => $message
            ])
            ->response()
            ->setStatusCode($statusCode);
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
     * @param UpdateCommentRequest $request
     * @param Shipping $shipping
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCommentRequest $request, Shipping $shipping, Comment $comment)
    {
        try {
            $comment->update([
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]);

            $statusCode = Response::HTTP_ACCEPTED;

            $message = trans('messages.shipping.comments.update.success');

            $shipping->load(['boxes', 'comments.creator'])
                ->loadCount('boxes as total_boxes')
                ->loadSum('boxes as total_volume', 'volume');
        } catch (\Exception $exception) {
            Log::channel('shipping')->error($exception);

            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

            $message = trans('messages.shipping.comments.update.failed');
        }

        return ( new ShippingResource($shipping) )
            ->additional([
                'message' => $message
            ])
            ->response()
            ->setStatusCode($statusCode);
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
