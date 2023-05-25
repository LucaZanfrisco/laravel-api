<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects','nome')->ignore($this->project),
            ],
            'type_id' => 'nullable|exists:types,id',
            'immagine' => 'nullable|image|max:4096',
            'descrizione' => 'string|max:1000|nullable',
            'data_di_creazione' => 'required|date',
            'completato' => 'required|boolean',
            'riscosso' => 'required|boolean',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }
}
