<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'event_name' => 'nullable|string',
            'event_type' => 'nullable|integer',
            'attendance_type' => 'nullable|string',
            'organizer' => 'nullable|string',
            'venue' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
        ];
    }
}
