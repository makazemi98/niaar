<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {

            return $this->showCustomErrorPage();
        }

        return parent::render($request, $exception);
    }

    protected function showCustomErrorPage()
    {
        return response()->view('errors.large_size');
        // return view('pages.system.file_size');
        // return response()::back()
        // session()->flash('message', [
        //     'type' => 'info',
        //     'content' => 'Nous nous excusons pour cette gène ! 
        //     Notre équipe technique est informée du problème et passera
        //     à la correction dans le plus brefs délais que possible
        //     '
        // ]);
        // return \Illuminate\Support\Facades\Redirect::back();
    }
}
