<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarios extends FormRequest
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->request->get('id'),
            'status_user_id' => 'required',
            'grupos.grupo_id' => 'required',
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|required_with:senha|min:6'
        ];
    }
}
