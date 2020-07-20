<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTalent;
use App\Http\Resources\V1\TalentResource;
use App\models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TalentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['checkGroup:super-user,pic'], ['only' => ['store', 'destroy', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TalentResource::collection(
            Talent::filter()
                ->latest()
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTalent $request)
    {
        $picId = Auth::user()->group_id == 3 ? Auth::user()->id : null;
        if ($picId) {
            $validated = $request->validated();
            $cv = $request->file('cv');
            $filename = time() . "_" . preg_replace('/\s+/', '_', strtolower($cv->getClientOriginalName()));
            $cv->storeAs('public/cv/', $filename, 'local');

            $validated['pic_id'] = $picId;
            $validated['cv'] = $filename;

            $talent = Talent::create($validated);
            return new TalentResource($talent);
        } else {
            return response()
                ->json(['error' => 'Forbidden Not PIC'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function show(Talent $talent)
    {
        return new TalentResource($talent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTalent $request, Talent $talent)
    {

        $validated = $request->validated();

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $filename = time() . "_" . preg_replace('/\s+/', '_', strtolower($cv->getClientOriginalName()));
            $cv->storeAs('public/cv/', $filename, 'local');
            $validated['cv'] = $filename;
        }

        $talent->update($validated);
        return new TalentResource($talent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talent $talent)
    {
        $own = $talent->pic_id == Auth::user()->id;

        if ($own) {
            $talent->delete();
            return response()->json('', 204);
        } else {
            return response()
                ->json(['error' => 'Forbidden, Not Your Talent!'], 403);
        }
    }
}
