<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|max:45',
            'sobrenome' => 'required|max:45',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é requerido',
            'sobrenome.required' => 'O campo sobrenome é requerido',
            'nome.max' => 'O tamanho do nome inserido no campo não pode utltrapassar 45 caracteres',
            'sobrenome.max' => 'O tamanho do nome inserido no campo não pode utltrapassar 45 caracteres',
        ];
    }
}
