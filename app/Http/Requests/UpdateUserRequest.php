<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'sr_code' => 'nullable|string',
            'year_level' => 'nullable|string',
            'department' => 'nullable|string',
            'gsuite_email' => 'nullable|string',
            'password' => 'nullable|string',
            'fp_user' => 'nullable|string',
            'gender' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'branch' => 'nullable|string',
            'user_type' => 'nullable|string',
            'is_active' => 'nullable|string',
            'fp_user' => 'nullable|string',
        ];
    }
}
