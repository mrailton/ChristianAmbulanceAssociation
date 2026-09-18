<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProcessResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::guest();
    }

    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
