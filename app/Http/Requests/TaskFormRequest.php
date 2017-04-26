<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
            "milestone_id" => "required",
            "task_description" => "required|max:255",
            "start_date" => "required|date",
            "due_date" => "required|date"
        ];
    }

    public function messages()
    {
        return [
            "task_description.required" => "Please enter task description",
        ];
    }
}
