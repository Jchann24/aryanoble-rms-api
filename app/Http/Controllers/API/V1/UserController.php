<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['checkGroup:super-user,pic'], ['except' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(
            User::where('group_id', 5)
                ->filter()
                ->latest()
                ->paginate(10)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $super = Auth::user()->is("Superuser");
        $pic = Auth::user()->is("PIC_TA_Group");
        $own = auth()->user()->id == $user->id;

        if ($own || $super || $pic) {
            $requestData = $request->all();
            if ($request->has('password')) {
                $requestData['password'] = bcrypt($requestData['password']);
            }
            $user->update($requestData);
            return new UserResource($user);
        } else {

            return response()
                ->json(['error' => 'Forbidden'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()
            ->json('', 204);
    }
}
