<?php

namespace App\Http\Requests\Inquiry;

use App\Enums\InquiryActionsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerformActionRequest extends FormRequest
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
            'action' => [
                'required',
                Rule::in(InquiryActionsEnum::values()),
                function ($attribute, $value, $fail) {
                    if (
                        $this->inquiry->status == InquiryActionsEnum::CANCEL->value &&
                        $this->input('action') == InquiryActionsEnum::CANCEL->value
                    ) {
                        $fail('The inquiry already cancelled!');
                    }
                }
            ],
            'assign_to' => [
                Rule::requiredIf($this->input('action') == InquiryActionsEnum::RE_ASSIGN->value),
                function ($attribute, $value, $fail) {
                    if($this->input('action') == InquiryActionsEnum::RE_ASSIGN->value) {
                        if (! Rule::exists('users', 'id')) {
                            $fail('The selected assign to field is invalid!');
                        }
                        if ($this->inquiry->assigned_to == $this->input('assign_to')) {
                            $fail('This inquiry already assigned to selected user!');
                        }
                    }

                }
            ],
            'reason' => ['required', 'string', 'min:3']
        ];
    }
}
