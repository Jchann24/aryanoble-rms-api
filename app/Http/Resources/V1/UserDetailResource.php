<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
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
            'full_name' => $this->full_name,
            'dob' => $this->dob,
            'phone_num' => $this->phone_num,
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,
            'postal_code' => $this->postal_code,
            'about_me' => $this->about_me,
            'degree' => $this->degree,
            'university' => $this->university,
            'faculty' => $this->faculty,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
