<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecetteRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'instruction' => 'required|text',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ];
    }
}
