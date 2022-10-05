<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name' => 'required',
            'permissions' => 'required|array|min:1',
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "أدخل  اسم الصلاحية ",

            'permissions.required' => "يجب ادخال دور ",
            'content.min' => " يجب ادخال دور واحد علي الأقل ",

        ];

    }
}
