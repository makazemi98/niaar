<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Reminder\StoreReminderRequest;
// use App\Http\Resources\Reminder\ReminderCollection;
// use App\Http\Resources\Reminder\ReminderResource;
// use App\Interfaces\Repositories\ReminderRepositoryInterface;
// use App\Models\Reminder;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Log;
// use Symfony\Component\HttpFoundation\Response;

// class ReminderController extends Controller
// {
//     public function __construct(protected ReminderRepositoryInterface $reminderRepository)
//     {
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @param Request $request
//      * @return ReminderCollection
//      */
//     public function index(Request $request)
//     {
//         return new ReminderCollection($this->reminderRepository->userReminders($request->toArray()));
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  StoreReminderRequest  $request
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function store(StoreReminderRequest $request)
//     {
//         $result = $this->reminderRepository->store($request->toArray());

//         $message = trans('messages.reminders.create.success');
//         $statusCode = Response::HTTP_CREATED;

//         if ($result instanceof \Exception) {
//             Log::channel('reminders')
//                 ->error($result);

//             $message = trans('messages.reminders.create.failed');
//             $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
//         }

//         return ( new ReminderResource($result) )
//             ->additional([
//                 'message' => $message
//             ])
//             ->response()
//             ->setStatusCode($statusCode);
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function destroy(Reminder $reminder)
//     {
//         abort_if(
//             $reminder->user_id !== Auth::id(),
//             Response::HTTP_NOT_FOUND,
//             trans('messages.reminders.not_found')
//         );

//         $reminder->delete();

//         return response()->json(['message' => 'Reminder has been deleted']);
//     }
// }
