<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCareerdocument extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|file|mimes:csv,txt,xlx,xls,pdf,docx,zip,eps,ffx,jpg,png,webp',
            'career_title_en' => 'required|max:255',
            'career_title_es' => 'required|max:255',
        ];
    }
}
