<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'phone' => 'required|numeric',
            'address' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:255',
            'facebook' => 'required|max:50',
            'instagram' => 'required|max:50',
            'twitter' => 'required|max:50'
        ];
    }
}
