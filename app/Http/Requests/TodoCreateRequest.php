<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
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
            'title' => 'required|max:50'
        ];
    }

    public function messages()
     {
              return [
                     'title.required' => 'A todo title is mandatory, value required',
                     'title.max' => 'Length of todo can be only max of 50'

              ];
   }
}
