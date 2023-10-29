<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
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
            //
            "email"  => 'required|email',
            "password" => 'required|string',
            "full_name"  => 'required|string',
            "specialty" => 'required|string',
            "experience" => 'required|string',
            "sex"  => 'required|string',
            "province" => 'required|string',
            "district" => 'required|string',
            "commune" => 'required|string',
            "street_address" => 'required|string',
        ];
    }
}
