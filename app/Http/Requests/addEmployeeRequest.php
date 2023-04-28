<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'           => 'required',
            'job_id'         => 'required|numeric',
            'image'          => 'required|image|max:2048',
            'hire_date'      => 'required',
        ];
    }
}
