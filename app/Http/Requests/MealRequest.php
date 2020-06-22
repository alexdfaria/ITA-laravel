<?php

namespace App\Http\Requests;

use App\User;
use App\Meal;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
            ],
            'name' => [
                'required', 'min:3',
            ],
            'company' => [
                'required', 'min:3',
            ],
            'price' => [
                'required',
            ],
            'stock' => [
                'required',
            ]
        ];
    }
}
