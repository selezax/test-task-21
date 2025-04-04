<?php

namespace Tests\DomainsPlans\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DomainUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'domains.*' => [
                'required',
                'regex:/^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/.*)?$/',
                ],
            'removes.*' => [
                'nullable',
                'integer',
                ],
        ];
    }

    public function messages(): array
    {
        return [
            'domains.*.required' => 'The domain field is required.',
            'domains.*.regex' => 'The domain field must be a valid domain or URL (e.g., test.com or http://test.com).',
        ];
    }
}
