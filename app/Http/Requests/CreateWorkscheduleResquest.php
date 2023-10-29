<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkscheduleResquest extends FormRequest
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
            "e_name" => "required|string",
            "time"=>"required|string",
            't0' => "required|string",
            't1' => "required|string",
            't2' => "required|string",
            't3' => "required|string",
            't4' => "required|string",
            't5' => "required|string",
            't6' => "required|string",
        ];
    }
}
