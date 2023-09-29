<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'required|numeric|regex:/^63\d{10}$/'
            'message' => 'required|string|min:5|max:255'
        ];
    }
}
