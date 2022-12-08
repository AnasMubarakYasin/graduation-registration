<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrarRequest extends FormRequest
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
            'photo' => 'required|image|max:2048',
            'name' => 'required|string',
            'nim' => 'required|string|size:11',
            'nik' => 'required|string|size:16',
            'pob' => 'required|string',
            'dob' => 'required|date',
            'faculty' => 'required|string',
            'study_program' => 'required|string',
            'ipk' => 'required|integer',

            'munaqasyah' => 'required|image|max:2048',
            'certificate' => 'required|image|max:2048',
            'ktp' => 'required|image|max:2048',
            'kk' => 'required|image|max:2048',
            'spukt' => 'required|image|max:2048',
        ];
    }
}
