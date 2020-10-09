<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ErfResource;
use App\Models\Erf;
use App\Models\ErfAcceptance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ErfAcceptanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkGroup:pic'], ['only' => 'update']);
    }
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
    public function store(Request $request)
    {
        $request->validate([
            'erf_id' => 'required|numeric',
            'acceptance' => 'required|numeric',
            'hashed' => 'required|string',
        ]);

        if ($request->input('acceptance') == 0 && $request->input('notes') == null) {
            return response()
                ->json(['error' => 'REJECTION NOTES MUST BE FILLED IF YOU REJECT THIS ERF'], 400);
        }

        $decrypt = Crypt::decryptString($request->input('hashed'));

        if ($decrypt != $request->input('erf_id')) {
            return response()
                ->json(['error' => 'encryption mismatched'], 403);
        }

        $exists = ErfAcceptance::where('erf_id', $decrypt)->first();
        if ($exists) {
            return response()
                ->json(['error' => 'This erf has been reviewed'], 409);
        }

        $erf = Erf::findOrFail($request->input('erf_id'));

        $acceptance = $erf->erfAcceptance()->create([
            'acceptance' => $request->input('acceptance'),
            'notes' => $request->input('notes')
        ]);

        return response()
            ->json(['success' => 'Review saved'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decrypt = Crypt::decryptString($id);
        $erf = Erf::findOrFail($decrypt);

        return new ErfResource($erf);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string'
        ]);

        $erfAcceptance = ErfAcceptance::where('erf_id', $id)->firstOrFail();
        $erfAcceptance->acceptance = 100;
        $erfAcceptance->notes_by_pic = $request->input('notes');
        $erfAcceptance->last_updated_by = Auth::user()->email;
        $erfAcceptance->save();

        return response()
            ->json(['success' => 'erf successfully rejected.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
