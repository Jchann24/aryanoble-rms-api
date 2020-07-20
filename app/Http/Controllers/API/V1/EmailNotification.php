<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Mail\UpdateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailNotification extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Mail::to($request->email)
            ->send(new UpdateNotification());
    }
}
