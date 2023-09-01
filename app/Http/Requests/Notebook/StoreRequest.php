<?php

namespace App\Http\Requests\Notebook;

use HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
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
            'full_name' => 'required|string',
            'company' => 'string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'birthday' => 'string',
            'photo' => 'string',
        ];
    }
}
