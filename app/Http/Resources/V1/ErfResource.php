<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ErfResource extends JsonResource
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
            'age_range_from' => $this->age_range_from,
            'age_range_to' => $this->age_range_to,
            'branch' => $this->branch,
            'business_justification' => $this->business_justification,
            'company' => $this->company,
            'created_at' => $this->created_at->format('Y-m-d\TH:i'),
            'department' => $this->department,
            'division' => $this->division,
            'education' => $this->education,
            'employee_status' => $this->employee_status,
            'job_title' => $this->job_title,
            'min_experience' => $this->min_experience,
            'planning' => $this->planning,
            'position' => $this->position,
            'purpose' => $this->purpose,
            'quantity' => $this->quantity,
            'sex' => $this->sex,
            'technical_competencies' => $this->technical_competencies,
            'title' => $this->title,
            'work_location' => $this->work_location,
            'working_hours' => $this->working_hours,
            'div_user' => $this->divUser,
            'cards' => [
                // 'link' => CandidateCardsLinkResource::collection($this->candidateCards),
                'count' => $this->candidateCards->count()
            ],
            'acceptance' => $this->erfAcceptance
        ];
    }
}
