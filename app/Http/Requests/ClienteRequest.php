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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'=> 'required',
            'rg'=> 'required',
            'email'=> 'required|email',
            'telefone'=> 'required',
            'endereco' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'=> 'O nome é obrigatório',
            'rg.required'=> 'O RG é obrigatório',
            'email.required'=> 'O e-mail é obrigatório',
            'email.email'=> 'O e-mail precisa ser um e-mail válido',
            'email.required'=> 'O e-mail é obrigatório',
            'telefone.required'=> 'O telefone é obrigatório',
            'endereco.required'=> 'O endereço é obrigatório'
        ];
    }
}
