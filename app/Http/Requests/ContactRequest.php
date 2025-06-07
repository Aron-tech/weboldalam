<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'string|nullable|max:13|min:10',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }
}
