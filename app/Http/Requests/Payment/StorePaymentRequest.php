<?php

namespace App\Http\Requests\Payment;

use App\Enums\BalanceSheetCategoryEnum;
use App\Enums\PaymentTabsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StorePaymentRequest extends FormRequest
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
            'inquiry_id' => ['required', Rule::exists('inquiries', 'id')],
            'customer_id' => ['nullable', Rule::exists('users', 'id')],
            'description' => ['required', 'string', 'min:5'],
            'debit' => ['required', 'numeric', 'min:0'],
            'credit' => ['required', 'numeric', 'min:0'],
            'date' => ['nullable', 'date', 'date_format:Y-m-d'],
        ];
    }
}


// PaymentTabsEnum::PAYMENTS->value => [
//     'inquiry_id' => ['required', Rule::exists('inquiries', 'id')]
// ],
// PaymentTabsEnum::FUTURE_DUES->value => [
//     'inquiry_id' => ['required', Rule::exists('inquiries', 'id')],
//     'date' => ['required', 'date', 'date_format:Y-m-d'], // Payment date
//     'is_paid' => ['required', 'boolean']
// ],
// PaymentTabsEnum::PETTY->value => [
//     'invoice_no' => ['nullable', 'string', 'min:2'],
// ]