<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Mail\FormEmail as AppFormEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormEmail extends Controller
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
            ->send(new AppFormEmail());
    }
}
