<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     
    /*
    public function authorize(): bool
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //作品登録機能の文字制限
            'work.name' => 'required|string|max:100',
            'work.introduction' => 'required|string|max:300',
        ];
    }
    
    public function messages()
    {
        return [
            'work.name.required' => '作品名の項目は必須です',
            'work.name.max' => '作品名は100字以内で入力してください',
            'work.introduction.required' => '作品説明の項目は必須です',
            'work.introduction.max' => '作品説明は300字以内で入力してください',
        ];

    }
}