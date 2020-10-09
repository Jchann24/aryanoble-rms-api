<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreErf;
use App\Http\Resources\V1\ErfResource;
use App\Mail\ErfCreated;
use App\Models\Erf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ErfController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkGroup:pic,div-user'], ['except' => 'index', 'show']);
    }

    public function index()
    {
        if (Auth::user()->is("Div_User_Group")) {
            $erfs = Erf::where("div_user_id", Auth::user()->id)
                ->with('divUser')
                ->latest()
                ->paginate(10);
        } else if (Auth::user()->is("PIC_TA_Group")) {
            $erfs = Erf::has('erfAcceptance')->with('divUser')
                ->latest()
                ->paginate(10);
        }
        return ErfResource::collection($erfs);
    }

    public function show(Erf $erf)
    {
        return new ErfResource($erf);
    }

    public function store(StoreErf $request)
    {
        $divUserId = Auth::user()->group_id == 4 ? Auth::user()->id : null;
        $email = env('ERF_ACCEPT_EMAIL');

        if ($divUserId) {
            $validated = $request->validated();
            $validated['div_user_id'] = Auth::user()->id;

            $erf = Erf::create($validated);
            $erf['hashed'] = Crypt::encryptString($erf->id);

            Mail::to($email)
                ->send(new ErfCreated($erf));

            return new ErfResource($erf);
        } else {
            return response()
                ->json(['error' => 'Forbidden Not User'], 403);
        }
    }

    public function update(StoreErf $request, Erf $erf)
    {
        $own = $erf->div_user_id == Auth::user()->id;

        if ($own) {
            $validated = $request->validated();
            $erf->update($validated);
            return new ErfResource($erf);
        } else {
            return response()
                ->json(['error' => 'Forbidden, Not Your Erf!'], 403);
        }
    }

    public function destroy(Erf $erf)
    {
        $own = $erf->div_user_id == Auth::user()->id;

        if ($own) {
            $erf->delete();
            return response()->json('', 204);
        } else {
            return response()
                ->json(['error' => 'Forbidden Not Your Erf'], 403);
        }
    }
}
