<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterviewDetail;
use App\Http\Resources\V1\InterviewDetailResource;
use App\models\InterviewDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware(['checkGroup:super-user,admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InterviewDetailResource::collection(InterviewDetail::latest()->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewDetail $request)
    {
        $adminId = Auth::user()->group_id == 2 ? Auth::user()->id : null;
        if ($adminId) {
            $validated = $request->validated();
            $validated['admin_id'] = $adminId;

            $detail = InterviewDetail::create($validated);
            return new InterviewDetailResource($detail);
        } else {
            return response()
                ->json(['error' => 'Forbidden Not Admin'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\InterviewDetail  $interviewDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewDetail $interviewDetail)
    {
        return new InterviewDetailResource($interviewDetail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\InterviewDetail  $interviewDetail
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInterviewDetail $request, InterviewDetail $interviewDetail)
    {
        $own = $interviewDetail->admin_id == Auth::user()->id;

        if ($own) {
            $validated = $request->validated();
            $interviewDetail->update($validated);
            return new InterviewDetailResource($interviewDetail);
        } else {
            return response()
                ->json(['error' => 'Forbidden, Not Your Interview Detail!'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\InterviewDetail  $interviewDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterviewDetail $interviewDetail)
    {
        $own = $interviewDetail->admin_id == Auth::user()->id;


        if ($own) {
            $interviewDetail->delete();
            return response()->json('', 204);
        } else {
            return response()
                ->json(['error' => 'Forbidden, Not Your Interview Detail!'], 403);
        }
    }
}
