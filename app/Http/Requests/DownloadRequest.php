<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file_path' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'name' => ['nullable', 'string', 'max:255'],
            'headers' => ['array', 'nullable'],
        ];
    }
}
