<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'request_event_id' => 'required',
            'comment_content' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'comment_content.required' => 'You have to input content if you want comment
                this article.',
            'comment_content.max' => 'Exceeds the maximum number of characters.',
            'request_event_id.required' => 'Request Event Id undefined!'
        ];
    }
}
