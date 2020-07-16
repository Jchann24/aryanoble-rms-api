<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTalent extends FormRequest
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
        return [
            'candidate_account_id' => 'sometimes|integer',
            'name' => 'sometimes|string',
            'source' => 'sometimes|string',
            'cv' => 'sometimes|mimes:pdf,doc,docs',
            'address' => 'sometimes|string',
            'applied_position' => 'sometimes|string',
            'dob' => 'sometimes|date',
            'email' => 'sometimes|email',
            'gender' => 'sometimes|string',
            'last_education' => 'sometimes|string',
            'mobile_phone' => 'sometimes|string',
            'nik' => 'sometimes|string',
            'total_working_experience' => 'sometimes|numeric',
            'university' => 'sometimes|string',
        ];
    }
}
