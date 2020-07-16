<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreErf extends FormRequest
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
                'title' => 'sometimes|string',
                'age_range_from' => 'sometimes|numeric',
                'age_range_to' => 'sometimes|numeric',
                'branch' => 'sometimes|string',
                'business_justification' => 'sometimes|string',
                'department' => 'sometimes|string',
                'division' => 'sometimes|string',
                'education' => 'sometimes|string',
                'employee_status' => 'sometimes|string',
                'job_title' => 'sometimes|string',
                'min_experience' => 'sometimes|numeric',
                'planning' => 'sometimes|string',
                'purpose' => 'sometimes|string',
                'quantity' => 'sometimes|numeric',
                'sex' => 'sometimes|string',
                'technical_competencies' => 'sometimes|string',
                'work_location' => 'sometimes|string',
                'working_hours' => 'sometimes|string',
                'position' => 'sometimes|string',
                'company' => 'sometimes|string',
            ];
        } else {
            return [
                'title' => 'required|string',
                'age_range_from' => 'required|numeric',
                'age_range_to' => 'required|numeric',
                'branch' => 'required|string',
                'business_justification' => 'required|string',
                'department' => 'required|string',
                'division' => 'required|string',
                'education' => 'required|string',
                'employee_status' => 'required|string',
                'job_title' => 'required|string',
                'min_experience' => 'required|numeric',
                'planning' => 'required|string',
                'purpose' => 'required|string',
                'quantity' => 'required|numeric',
                'sex' => 'required|string',
                'technical_competencies' => 'required|string',
                'work_location' => 'required|string',
                'working_hours' => 'required|string',
                'position' => 'required|string',
                'company' => 'required|string',
            ];
        }
    }
}
