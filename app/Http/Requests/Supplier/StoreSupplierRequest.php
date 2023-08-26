<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupplierRequest extends FormRequest
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
            'company' => ['required', 'string', 'min:3', Rule::unique('suppliers', 'company')],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'mobile' => ['required'],
            'website' => ['nullable', 'url'],
            'country' => ['required', 'string', 'min:2'],
            // 'customers_id' => ['required', 'array', 'min:1'],
            // 'customers_id.*' => ['required', 'integer'],
            // 'persons_in_charge' => ['nullable', 'array', 'min:1'],
            // 'persons_in_charge.*' => ['required', 'integer'],
            // 'product_categories' => ['required', 'array', 'min:1'],
            // 'supplying_brands' => ['required', 'array', 'min:1'],
        ];
    }
}
