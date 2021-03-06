<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'group_id' => $this->group_id,
            'group' => $this->group->name,
            'created_at' => $this->created_at,
            'user_detail' => new UserDetailResource($this->userDetail),
            'profile_pic' => new ImageResource($this->image)
        ];
    }
}
