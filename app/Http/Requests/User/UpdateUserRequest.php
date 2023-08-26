<?php

namespace App\Http\Requests\User;

use App\Enums\GenderEnum;
use App\Enums\RolesEnum;
use App\Enums\UserTitleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'abbreviation' => ['nullable', 'string', 'min:3', Rule::unique('users', 'abbreviation')->ignore($this->user)],
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'gender' => ['required', Rule::in(GenderEnum::values())],
            'email' =>['required', 'email', Rule::unique('users')->ignore($this->user)],
            // 'role' => ['required', Rule::in(RolesEnum::values())],
            'avatar' => ['nullable', 'file'],
            'password' => ['nullable', 'alpha_num', 'min:8'],
            'confidential' => ['nullable', 'string'],
            'renewal_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'contact_person' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
            'company_name' => ['nullable', 'string'],
            'company_number' => ['nullable', 'string'],
            'contact_name_2' => ['nullable', 'string'],
            'mobile_number_2' => ['nullable', 'string'],
            'company_abbreviation' => ['nullable', 'string'],
            'cofidential' => ['nullable', 'string'],

        ];
    }
}
