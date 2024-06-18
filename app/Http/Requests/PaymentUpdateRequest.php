<?php

namespace App\Http\Requests;

use App\Enums\PaymentStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'props' => 'required|string',
            'value' => 'required|numeric',
            'status' => Rule::in(PaymentStatusEnum::asArray())
        ];
    }
}
