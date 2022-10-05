<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => 'required|min:2',
            "role_id" => 'required|numeric|exists:roles,id',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'password' => 'required|confirmed|min:8',
            'phone' => 'unique',
        ];
    }
}
