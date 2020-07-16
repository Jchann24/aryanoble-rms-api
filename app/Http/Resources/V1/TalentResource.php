<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TalentResource extends JsonResource
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
            'candidate' => new UserResource($this->candidateAccount),
            'name' => $this->name,
            'source' => $this->source,
            'cv' => Storage::url('cv/' . $this->cv),
            'address' => $this->address,
            'applied_position' => $this->applied_position,
            'dob' => $this->dob,
            'email' => $this->email,
            'gender' => $this->gender,
            'last_education' => $this->last_education,
            'mobile_phone' => $this->mobile_phone,
            'nik' => $this->nik,
            'total_working_experience' => $this->total_working_experience,
            'university' => $this->university,
            'created_at' => $this->created_at
        ];
    }
}
