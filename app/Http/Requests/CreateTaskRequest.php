<?php

namespace App\Http\Requests;

use App\Enums\AUserType;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string|min:5',
            'assigned_to_id' => 'required|exists:users,id,type,' . AUserType::USER,
            'assigned_by_id' => 'required|exists:users,id,type,' . AUserType::ADMIN,
        ];
    }
}
