<?php

namespace Tests\DomainsPlans\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DomainFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'domain' => [
                'required',
                'regex:/^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/.*)?$/',
                ],
        ];
    }

    public function messages(): array
    {
        return [
            'domain.required' => 'The domain field is required.',
            'domain.regex' => 'The domain field must be a valid domain or URL (e.g., test.com or http://test.com).',
        ];
    }
}
