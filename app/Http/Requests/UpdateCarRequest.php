<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'brand' => ['nullable', 'string', 'max:25'],
            'model' => ['nullable', 'string', 'max:25'],
            'car_body' => ['nullable', 'string', 'max:25'],
            'year_of_production' => ['nullable', 'string', 'digits:4'],
            'drive' => ['nullable', 'string', 'max:3','min:3'],
            'engine_power' => ['nullable', 'string', 'max:25'],
            'acceleration' => ['nullable', 'string', 'max:25'],
            'maximum_speed' => ['nullable', 'string', 'max:25'],
            'number_of_seats' => ['nullable', 'string', 'digits:1'],
            'car_coverage' => ['nullable', 'string', 'max:25'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
