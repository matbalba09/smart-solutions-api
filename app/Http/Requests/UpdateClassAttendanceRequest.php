<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassAttendanceRequest extends FormRequest
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
            'course_code' => 'nullable|string',
            'title' => 'nullable|string',
            'name_of_faculty' => 'nullable|string',
            'date_time' => 'nullable|string',
            'room_or_venue' => 'nullable|string',
            'is_deleted' => 'nullable|string',
        ];
    }
}
