<?php

namespace App\Http\Requests\Box;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoxRequest extends FormRequest
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
            'client_id' => ['required', 'integer'],
            'inquiry_id' => ['required', 'integer'],
            'sign' => ['required', 'string', 'min:2'],
            'content' => ['required', 'string', 'min:2'],
            'height' => ['required', 'numeric', 'min:0'],
            'length' => ['required', 'numeric', 'min:0'],
            'width' => ['required', 'numeric', 'min:0'],
            'volume' => ['required', 'numeric', 'min:0'],
        ];
    }
}
