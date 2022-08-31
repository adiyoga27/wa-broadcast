<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
            'message' => 'required',
            'setting_id' => 'required',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'video' => 'nullable',
            'video.*' => 'nullable',
            'file' => 'nullable',
            'file.*' => 'nullable',
        ];
    }
}
