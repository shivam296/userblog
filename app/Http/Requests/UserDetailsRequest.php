<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsRequest extends FormRequest
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
              
              'image_name' => 'required|image|mimes:jpeg,png,jpg|max:100',
              'title' => 'required|max:255',
              'description' => 'required|max:65535',
              'tag' => 'required',

        ];
    }
}
