<?php

namespace App\Http\Requests\Inquiry;

use App\Enums\InquiryStatusesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeStatusRequest extends FormRequest
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
            'stage' => [
                'required', Rule::exists('permissions', 'id')
            ],
            'reason' => ['nullable', 'string', 'min:3']
        ];
    }
}
