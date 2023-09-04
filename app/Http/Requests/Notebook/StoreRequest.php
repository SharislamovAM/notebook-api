<?php

namespace App\Http\Requests\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
