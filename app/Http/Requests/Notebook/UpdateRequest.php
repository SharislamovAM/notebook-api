<?php

namespace App\Http\Requests\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            "full_name" => "required|string",
            "company" => "nullable|string",
            "phone" => "required|string",
            "email" => "required|email",
            "birthday" => "nullable|date",
            "photo" => "nullable|string"
        ];
    }
}
