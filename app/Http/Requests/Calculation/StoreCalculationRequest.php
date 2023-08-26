<?php

namespace App\Http\Requests\Calculation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCalculationRequest extends FormRequest
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
            'supplier_id' => ['required', Rule::exists('suppliers', 'id')],
            'buying_price' => ['required', 'numeric', 'min:0'],
            'buying_currency' => ['required', 'string', 'min:1'],
            'buying_total_price_aed' => ['required', 'numeric', 'min:0'],
            'quoted_price' => ['required', 'numeric', 'min:0'],
            'quoted_currency' => ['required', 'string', 'min:1'],
            'quoted_price_aed' => ['required', 'numeric', 'min:0'],
            'actual_ordered_price_aed' => ['required', 'numeric', 'min:0'],
            'qty' => ['required', 'numeric', 'min:0'],
            'remark' => ['nullable', 'string', 'min:5'],
        ];
    }
}
