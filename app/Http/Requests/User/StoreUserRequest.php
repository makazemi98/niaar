<?php

namespace App\Http\Requests\User;

use App\Enums\GenderEnum;
use App\Enums\RolesEnum;
use App\Enums\UserTitleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        if ($this->has('avatar') && in_array($this->input('avatar'), [null, 'null'])) {
            $this->request->remove('avatar');
        }
    }

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
            'title' => ['nullable', 'string', Rule::in(UserTitleEnum::values())],
            'abbreviation' => ['nullable', 'string', 'min:3', Rule::unique('users', 'abbreviation')],
            'firstName' => ['required', 'string', 'min:3'],
            'lastName' => ['required', 'string', 'min:3'],
            'gender' => ['required', Rule::in(GenderEnum::values())],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'role' => ['nullable', Rule::in(RolesEnum::values())],
            'avatar' => ['nullable', 'file','mimes:png,jpg,jpeg'],
            'confidential' => ['nullable', 'string'],
            'renewal_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'contact_person' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
            'company_name' => ['nullable', 'string'],
            'company_number' => ['nullable', 'string'],
            'contact_name_2' => ['nullable', 'string'],
            'mobile_number_2' => ['nullable', 'string'],
            'cofidential' => ['nullable', 'string'],
            'company_abbreviation' => ['nullable', 'string'],
        ];
    }
}
