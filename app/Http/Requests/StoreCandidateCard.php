<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateCard extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'status_id' => 'sometimes|numeric',
                'candidate_id' => 'sometimes|numeric',
                'interview_detail_id' => 'sometimes|numeric',
                "talent_id" => 'sometimes|numeric'
            ];
        } else {
            return [
                "erf_id" => 'required|numeric',
            ];
        }
    }
}
