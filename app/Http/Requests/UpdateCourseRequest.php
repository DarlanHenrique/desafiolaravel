<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name' => 'required|min:3|max:191|string',
            'description' => 'required|min:3|max:3000',
            'image_link' => 'required|image',
            'video' => 'required|url'
        ];
    }
    public function attributes(){
        return[
            'name' => 'nome',
            'description' => 'descrição',
            'image_link' => 'imagem',
            'video' => 'video'
        ];
    }
}
