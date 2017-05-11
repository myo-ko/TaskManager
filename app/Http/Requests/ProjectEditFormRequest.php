<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class ProjectEditFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::findOrFail($this->user()->id)->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "description" => "required|max:255",
            "start_date" => "required|date",
            "end_date" => "required|date|after_or_equal:original_end_date",
        ];
    }

    public function messages()
    {
        return [
            "end_date.after_or_equal" => "The end date must greater than previous defined value",
        ];
    }
}
