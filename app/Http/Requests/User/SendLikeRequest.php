<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SendLikeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'from_user_id' => ['required', 'exists:users,id'],
        ];
    }
}
