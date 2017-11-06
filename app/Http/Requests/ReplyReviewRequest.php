<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyReviewRequest extends FormRequest
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
            'review_id' => 'required',
            'content' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'You have to input content if you want reply this review.',
            'content.max' => 'Exceeds the maximum number of characters.',
            'review_id.required' => 'Review Id undefined!'
        ];
    }
}
