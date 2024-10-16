<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomasUsuarioRequest extends FormRequest
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
			'evento_id' => 'required',
			'user_id' => 'required',
			'diploma_id' => 'required',
			'nota' => 'required',
			'asistencia' => 'required',
			'publicado' => 'required',
        ];
    }
}
