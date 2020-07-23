<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDetail extends FormRequest
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
                "full_name" => 'sometimes|string',
                "dob" => 'sometimes|date',
                "address" => 'sometimes|string',
                "city" => 'sometimes|string',
                "phone_num" => 'sometimes|numeric',
                "province" => 'sometimes|string',
                "postal_code" => 'sometimes|numeric',
                "about_me" => 'sometimes|string',
                "degree" => 'sometimes|string',
                "university" => 'sometimes|string',
                "faculty" => 'sometimes|string',
            ];
        } else {
            return [
                "full_name" => 'required|string',
                "dob" => 'required|date',
                "address" => 'required|string',
                "city" => 'required|string',
                "phone_num" => 'required|numeric',
                "province" => 'required|string',
                "postal_code" => 'required|numeric',
                "about_me" => 'required|string',
                "degree" => 'required|string',
                "university" => 'required|string',
                "faculty" => 'required|string',
            ];
        }
    }
}
