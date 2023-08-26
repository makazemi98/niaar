<?php

namespace App\Http\Requests\Payment;

use App\Enums\BalanceSheetCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentBalanceSheetRequest extends FormRequest
{
    // protected function prepareForValidation()
    // {
    // }

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
            'inquiry_id' => [
                Rule::requiredIf($this->input('category') == BalanceSheetCategoryEnum::ORDER_RELATED->value),
                Rule::exists('inquiries', 'id')
            ],
            'remark' => ['nullable', 'string', 'min:2'],
            'category' => ['required', 'string', Rule::in(BalanceSheetCategoryEnum::values())],
            'supplier_id' => ['required', Rule::exists('suppliers', 'id')],
            'customer_id' => ['nullable', Rule::exists('users', 'id')],
            'description' => ['required', 'string', 'min:5'],
            //            'debit' => ['required', 'numeric', 'min:0'],
            //            'credit' => ['required', 'numeric', 'min:0'],
        ];
    }
}
