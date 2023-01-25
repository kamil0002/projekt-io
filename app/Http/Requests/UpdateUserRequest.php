<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:25'],
            'surname' => ['nullable', 'string', 'max:25'],
            'email' => ['nullable', 'string', 'email', 'min:2','max:30',\Illuminate\Validation\Rule::unique('users')->ignore($this->route()->parameter('id'))],
            'password' => ['nullable', 'string', 'min:8', 'max:30', 'confirmed'],
            'pesel' => ['nullable', 'numeric', 'digits:11'],
            'address'  => ['nullable', 'string', 'max:35'],
            'phone' => ['nullable', 'string', 'max:9', 'digits-between: 0,9'],
        ];
    }
}
