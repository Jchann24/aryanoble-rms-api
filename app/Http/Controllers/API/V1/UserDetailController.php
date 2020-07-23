<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserDetail;
use App\Http\Resources\V1\UserDetailResource;
use App\models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserDetail $request)
    {
        $validated = $request->validated();
        // $validated['user_id'] = Auth::user()->id;

        $userDetail = UserDetail::firstorCreate(
            ['user_id' => Auth::user()->id],
            $validated
        );

        return new UserDetailResource($userDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserDetail $request, UserDetail $userDetail)
    {
        if ($userDetail->user_id != Auth::user()->id) {
            return response()
                ->json(['error' => 'Forbidden,'], 403);
        }
        $validated = $request->validated();
        $userDetail->update($validated);
        return new UserDetailResource($userDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
