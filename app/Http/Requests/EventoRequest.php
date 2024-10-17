<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
			'titulo' => 'required|string',
			'descripcion' => 'required',
			'terminos' => 'required',
			'inicio' => 'required',
			'termino' => 'required',
			'cupos' => 'required',
			'cupos_disponibles' => 'required',
			'publicacion' => 'required',
			'lugar' => 'required|string',
			'valor' => 'required',
        ];
    }
}
