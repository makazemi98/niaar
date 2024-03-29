<?php

namespace App\Http\Requests\FutureDue;

use App\Enums\BillToEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFutureDueRequest extends FormRequest
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
        // dd($this->all());
        return [
            'bill_to' => ['required', Rule::in(BillToEnum::values())],
            'payee_name' => ['required', Rule::exists('suppliers', 'id')],
            // 'payee_name' => ['required', 'string', 'min:2'],
            'payable_amount' => ['required', 'numeric', 'min:0'],
            'receivable_amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'min:2'],
            'due_date' => ['required', 'date', 'date_format:Y-m-d'],
            // 'is_paid' => ['required', 'boolean'],
            'description' => ['required', 'string'],
        ];
    }
}
