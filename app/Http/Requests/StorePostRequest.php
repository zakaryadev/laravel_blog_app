<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'title' => 'Tema',
            'short_content' => 'Qısqasha mazmunı',
            'content' => 'Maqala',
            'photo' => 'Fotoǵa silteme'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|unique:posts|min:5|max:255',
            'short_content' => 'required|min:5|max:255',
            'content' => 'required|min:5|max:2000',
            'photo' => 'image|max:12288'
        ];
    }
}
