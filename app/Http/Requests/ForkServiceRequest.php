<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForkServiceRequest extends FormRequest
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
            'serviceName' => 'required|max:255',
            'servicePrice' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'serviceName.required' => 'The service name field is required.',
            'serviceName.max' => 'Services name exceeds the maximum number of characters.',
            'servicePrice.required' => 'The service price field is required.',
            'servicePrice.numeric' => 'The service price must be a number.'
        ];
    }
}
