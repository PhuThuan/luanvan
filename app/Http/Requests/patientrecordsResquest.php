<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class patientrecordsResquest extends FormRequest
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
            "full_name" => 'required|string',
            "phone" => 'required|string',
            "occupation" => 'required|string',
            "email" => 'required|email',
            "province" => 'required|string',
            "ward" => 'required|string',
            "dob" => 'required|string',
            "gender" => 'required|string',
            "id_number" => 'required|string',
            "ethnicity" => 'required|string',
            "district" => 'required|string',
            "street_address" => 'required|string',
        ];
    }
}
