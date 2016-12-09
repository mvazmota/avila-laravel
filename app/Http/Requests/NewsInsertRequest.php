<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsInsertRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo de título é obrigatório',
            'description.required' => 'O campo de descrição é obrigatório',
            'image.required' => 'O campo de imagem é obrigatório',
        ];
    }
}
