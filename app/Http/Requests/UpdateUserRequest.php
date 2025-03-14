<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() && true;
    }

    protected function prepareForValidation()
    {
        if ($this->new_password && $this->current_password && $this->confirm_password) {
            if (Hash::check($this->current_password, auth()->user()->password)) {
                $newPassword = $this->new_password;
            } else {
                $newPassword = 1;
            }

            $this->merge([
                'password' => $newPassword,
                'password_confirmation' => $this->confirm_password,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|regex:/^[\w.-]+@([\w-]+\.)+[\w]{2,4}$/i|string|unique:users,email,' . auth()->user()->id,
            'role' => 'nullable|string',
            'institution' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'description' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.string' => 'The current password is not correct.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
