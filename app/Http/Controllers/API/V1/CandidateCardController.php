<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateCard;
use App\Http\Resources\V1\CandidateCardResource;
use App\models\CandidateCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateCardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkGroup:super-user,pic'], ['only' => 'store', 'destroy']);
        $this->middleware(['checkGroup:super-user,pic,div-user,admin'], ['only' => 'update']);
        $this->middleware(['checkGroup:super-user,pic,div-user,admin,candidate'], ['only' => 'index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUser = Auth::user()->id;

        return Auth::user()->group_id == 2 ?
            CandidateCardResource::collection(CandidateCard::latest()->paginate(6)) : CandidateCardResource::collection(
                CandidateCard::whereHas('erf', function ($q) {
                    $loggedInUser = Auth::user()->id;
                    $q->where('erfs.div_user_id', $loggedInUser);
                })
                    ->orWhere("pic_id", $loggedInUser)
                    ->orWhere("candidate_id", $loggedInUser)
                    ->latest()
                    ->paginate(6)
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(StoreCandidateCard $request)
    {
        $picId = Auth::user()->group_id == 3 ?
            Auth::user()->id : null;
        if ($picId) {
            $validated = $request->validated();
            $validated['pic_id'] = $picId;
            $validated['status_id'] = 1;
            $validated['last_updated_by_id'] = $picId;

            $card = CandidateCard::create($validated);
            return new CandidateCardResource($card);
        } else {
            return response()
                ->json(['error' => 'Not PIC'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\CandidateCard  $candidateCard
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateCard $candidateCard)
    {
        if (Auth::user()->group_id == 5) {
            if (Auth::user()->id == $candidateCard->candidate_id) {
                return new CandidateCardResource($candidateCard);
            } else {
                return response()
                    ->json(['error' => 'Forbidden Not Your Card.'], 403);
            }
        } else {
            return new CandidateCardResource($candidateCard);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\CandidateCard  $candidateCard
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCandidateCard $request, CandidateCard $candidateCard)
    {
        $user = Auth::user();
        $pic = $user->group_id == 3;
        $div_user = $user->group_id == 4;

        if ($pic) {

            if ($candidateCard->pic_id == $user->id) {
                $validated = $request->validated();
                $validated['last_updated_by_id'] = $user->id;

                $candidateCard->update($validated);
                return new CandidateCardResource($candidateCard);
            } else {
                return response()
                    ->json(['error' => 'Forbidden, Not your Card. PIC Cannot Update Card.'], 403);
            }
        } else if ($div_user) {

            if ($candidateCard->erf->div_user_id == $user->id) {
                $validated = $request->validated();
                $validated['last_updated_by_id'] = $user->id;

                $candidateCard->update($validated);
                return new CandidateCardResource($candidateCard);
            } else {
                return response()
                    ->json(['error' => 'Forbidden,Not your Card. Div User Cannot Update Card.'], 403);
            }
        } else {

            $validated = $request->validated();
            $validated['last_updated_by_id'] = $user->id;
            $candidateCard->update($validated);
            return new CandidateCardResource($candidateCard);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\CandidateCard  $candidateCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidateCard $candidateCard)
    {
        $own = $candidateCard->pic_id == Auth::user()->id;

        if ($own) {
            $candidateCard->delete();
            return response()->json('', 204);
        } else {
            return response()
                ->json(['error' => 'Forbidden, Not Your Card!'], 403);
        }
    }
}
