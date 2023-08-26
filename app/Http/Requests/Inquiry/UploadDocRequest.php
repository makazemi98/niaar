<?php

namespace App\Http\Requests\Inquiry;

use App\Enums\InquiryDocsCollectionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadDocRequest extends FormRequest
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
        return [
            'docs' => ['nullable', 'array', 'min:1'],
            'docs.*' => ['mimes:pdf'],
            'type' => ['required', Rule::in(InquiryDocsCollectionEnum::values())],
        ];
    }
}
