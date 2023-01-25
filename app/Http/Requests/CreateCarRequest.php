<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
            'brand' => ['string', 'max:25'],
            'model' => ['string', 'max:25'],
            'car_body' => ['string', 'max:25'],
            'year_of_production' => ['string', 'digits:4'],
            'drive' => ['string', 'max:3','min:3'],
            'engine_power' => ['string', 'max:25'],
            'acceleration' => ['string', 'max:25'],
            'maximum_speed' => ['string', 'max:25'],
            'number_of_seats' => ['string', 'digits:1'],
            'car_coverage' => ['string', 'max:25'],
            'price' => ['numeric', 'min:0'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
