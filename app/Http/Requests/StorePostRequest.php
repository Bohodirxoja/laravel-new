<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function attributes(): array
    {
        return [
            'title' => 'title Toliqmas',
            'short_content' => 'short_content Toliqmas',
            'contents' => 'contents Toliqmas',
        ];
    }


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
            'title'=> 'required',
            'short_content'=> 'required',
            'contents'=> 'required',
            'photo'=>'nullable|image|max:2048'
        ];
    }
}
