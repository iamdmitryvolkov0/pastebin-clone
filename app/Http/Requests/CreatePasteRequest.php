<?php

namespace App\Http\Requests;

use App\Enums\PasteStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreatePasteRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:10'],
            'body' => ['required', 'string', 'min:10'],
            'status' => ['sometimes', new Enum(PasteStatusEnum::class)]
        ];
    }
}
