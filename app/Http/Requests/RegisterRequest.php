<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ];
    }

    /**
     * Ошибки валидации
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'Пользователь с такой эл. почтой уже существует',
            'password.min' => 'Минимальная длина пароля: 3 символа',
        ];
    }
}
