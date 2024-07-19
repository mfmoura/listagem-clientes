<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            "name" => "string|required_without_all:email,address,position,income",
            "email" => "email|required_without_all:name,address,position,income",
            "address" => "string|required_without_all:name,email,position,income",
            "position" => "string|required_without_all:name,email,address,income",
            "income" => "numeric|required_without_all:name,email,address,position"
        ];
    }
}
