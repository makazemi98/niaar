<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\PostTooLargeException;

class LargeFileException extends PostTooLargeException
{
    //
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        
        return response(...);
    }
}
