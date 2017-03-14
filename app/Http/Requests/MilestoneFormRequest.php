<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MilestoneFormRequest extends FormRequest
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
            "project_id" => "required",
            "ms_description" => "required",
            "start_date" => "required|date",
            "due_date" => "required|date",
        ];
    }

    public function messages()
    {
        return [
            "description.required" => "Please enter milestone description.",
            "start_date.date" => "Start date format is incorrect.",
            "end_date.date" => "End date format is incorrect.",
        ];
    }
}
