<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notifications\NotificationCollection;
use App\Http\Resources\Notifications\NotificationResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['data' => new NotificationCollection(Auth::user()->notifications)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(
            [
                'data' => new NotificationResource(Auth::user()->notifications->where('id', $id)->first())
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $notification = Auth::user()->notifications->where('id', $id)->first();

        $notification->markAsRead();

        return response()->json(
            [
                'data' => new NotificationResource($notification)
            ],
            Response::HTTP_ACCEPTED
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $notification = Auth::user()->notifications->where('id', $id)->first();

        abort_if(
            is_null($notification),
            Response::HTTP_NOT_FOUND,
            trans('messages.notifications.not_found')
        );

        $notification->delete();

        return response()->json(['message' => trans('messages.notifications.delete.success')]);
    }
}
