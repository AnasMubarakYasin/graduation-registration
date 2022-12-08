<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegistrarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('student')->hasUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'photo' => 'nullable|image|max:2048',
            'name' => 'nullable|string',
            'nim' => 'nullable|string|size:11',
            'nik' => 'nullable|string|size:16',
            'pob' => 'nullable|string',
            'dob' => 'nullable|date',
            'faculty' => 'nullable|string',
            'study_program' => 'nullable|string',
            'ipk' => 'nullable|integer',

            'munaqasyah' => 'nullable|image|max:2048',
            'certificate' => 'nullable|image|max:2048',
            'ktp' => 'nullable|image|max:2048',
            'kk' => 'nullable|image|max:2048',
            'spukt' => 'nullable|image|max:2048',
        ];
    }
}
