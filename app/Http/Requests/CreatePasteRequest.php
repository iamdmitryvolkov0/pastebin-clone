<?php

namespace App\Http\Requests;

use App\Enums\PasteStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreatePasteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5'],
            'body' => ['required', 'string', 'min:5'],
            'status' => ['sometimes', new Enum(PasteStatusEnum::class)],
            'hide_in' => ['sometimes', 'integer', 'nullable'],
            'language' => ['sometimes', 'string', 'nullable'],
        ];
    }
}
