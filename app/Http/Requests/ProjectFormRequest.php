<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            "description" => "required",
            "start_date" => "required|date",
            "end_date" => "required|date",
        ];
    }

    public function messages()
    {
        return [
            "description.required" => "Please enter project description.",
            "start_date.date" => "Date format is incorrect.",
        ];
    }
}