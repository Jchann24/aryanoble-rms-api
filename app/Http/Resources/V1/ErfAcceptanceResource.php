<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ErfAcceptanceResource extends JsonResource
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
            'acceptance' => $this->acceptance,
            'notes' => $this->notes,
            'notes_by_pic' => $this->notes_by_pic
        ];
    }
}
