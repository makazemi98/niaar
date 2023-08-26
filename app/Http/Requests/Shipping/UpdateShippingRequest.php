<?php

namespace App\Http\Requests\Shipping;

use App\Enums\ShippingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShippingRequest extends FormRequest
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
            'captain_info' => ['required', 'string', 'min:3'],
            'agent_name' => ['required', 'string', 'min:3'],
            'agent_no' => ['required', 'string', 'min:3'],
            'sign' => ['required', 'string', 'min:2'],
            'handed_over_date' => ['required', 'date', 'date_format:Y-m-d'],
            'status' => ['required', Rule::in(ShippingStatusEnum::values())],
            'delivery_doc' => ['nullable', 'file', 'mimes:pdf']
        ];
    }
}
