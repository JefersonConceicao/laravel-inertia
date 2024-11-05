<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages():array
    {
        return [
            'required' => 'Campo obrigatório',
            'same' => 'Campos não conferem',
            'email.unique' => 'Este e-mail já existe em nossa base de dados'
        ];
    }
}
