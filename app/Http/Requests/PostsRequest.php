<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'arTitle' => 'required|string',
            'enTitle' => 'required|string',
            'subOf' => 'required',
            'arSummery' => 'required|string',
            'enSummery' => 'required|string',
            'arContent' => 'required',
            'enContent' => 'required',
            'isPublished' => 'required',
        ];
    }
}
