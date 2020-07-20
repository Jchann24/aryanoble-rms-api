<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pic' => new UserResource($this->pic),
            'candidate' => new UserResource($this->candidate),
            'created_at' => $this->created_at,
            'erf' => new ErfResource($this->erf),
            'interview_detail' => new InterviewDetailResource($this->interviewDetail),
            'last_updated_by' => $this->lastUpdatedBy,
            'status' => $this->status,
            'talent' => new TalentResource($this->talent)
        ];
    }
}
