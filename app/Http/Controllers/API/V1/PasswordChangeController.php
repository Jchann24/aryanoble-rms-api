<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) {
            return response()
                ->json(['error' => 'Forbidden to change password!'], 403);
        }

        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed',
        ]);
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->newPassword)
            ])->save();
            return response()
                ->json(['success' => 'Password Changed!'], 200);
        }
    }
}
