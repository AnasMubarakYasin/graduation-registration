<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var Admin */
        $user = auth('admin')->user();
        return $user->is_administrator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'quota' => 'required|integer',
            'status' => 'required|in:open,close',
            'start_date' => 'required|date',
            'end_date' => 'required|date|gte:start_date'
        ];
    }
}
