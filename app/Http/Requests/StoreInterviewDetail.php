<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewDetail extends FormRequest
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
                'location' => 'sometimes|string',
                'date_time' => 'sometimes|date_format:Y-m-d\TH:i'
            ];
        } else {
            return [
                'location' => 'required|string',
                'date_time' => 'required|date_format:Y-m-d\TH:i'
            ];
        }
    }
}
