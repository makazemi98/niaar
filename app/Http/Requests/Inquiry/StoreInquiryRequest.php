<?php

namespace App\Http\Requests\Inquiry;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreInquiryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(Auth::user()->hasRole(['client'])){
            return [
                'title' => ['required', 'string', 'min:3'],
                'description' => ['required', 'string', 'min:3'],
                'docs' => ['nullable', 'array', 'min:1'],
                'docs.*' => ['mimes:pdf'],
                'remark' => ['nullable', 'string', 'min:3']
            ];
        }
        return [
            'client_id' => ['required', Rule::exists('users', 'id')],
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'docs' => ['nullable', 'array', 'min:1'],
            'docs.*' => ['mimes:pdf'],
            'remark' => ['nullable', 'string', 'min:3']
        ];
    }
}
