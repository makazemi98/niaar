<?php

namespace App\Http\Requests\Inquiry;

use App\Enums\CommentTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
            'title' => ['nullable', 'string', 'min:3'],
            'body' => ['required', 'string', 'min:3'],
            // 'to' => [
            //     Rule::exists('users', 'id')
            // ]
        ];
    }
}
