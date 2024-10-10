<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaccioneRequest extends FormRequest
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
			'payment_id' => 'required|string',
			'evento_id' => 'required',
			'user_id' => 'required',
			'status' => 'required|string',
			'status_detail' => 'required|string',
			'create_payment' => 'required',
			'get_payment' => 'required',
        ];
    }
}
