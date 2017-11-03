<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventPlanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'rate' => 'required|in:0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'You have to input content of Review.',
            'rate.required' => 'You have to choose the rating !',
            'rate.in' => 'You have to choose the rating !'
        ];
    }
}
