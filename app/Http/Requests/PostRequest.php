<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:5000',
            'place.name' => 'required',
            'place.caption' => 'required',
            'place.address' => 'required',
            'post.work_id' => 'required',
        ];
    
        // 編集時に特定のフィールドをスキップする
        if ($this->isMethod('put')) { // PUTメソッドの場合
            // バリデーションをスキップしたい場合は、ルールから削除
            // または 'nullable' を追加
            $rules['real_image_url'] = 'nullable'; // 任意に変更
            $rules['eyecatch_url'] = 'nullable'; // 任意に変更
        } else {
            // デフォルトでは必須
            $rules['real_image_url'] = 'required';
            $rules['eyecatch_url'] = 'required';
        }
    
        return $rules;
    }
    
    public function messages(){
      return [
        'post.title.required' => 'タイトルを入力してください',
        'post.title.max' => 'タイトルは100字以内で入力してください',
        'post.body.required' => '本文を入力してください',
        'post.body.max' => '本文は5000字以内で入力してください',
        'place.name.required' => '聖地の名前を入力してください',
        'place.caption.required' => '聖地についての情報を入力してください',
        'place.address.required' => '聖地の住所を入力してください',
        'real_image_url.required' => '聖地の写真をアップロードしてください',
        'eyecatch_url.required' => 'アイキャッチ画像をアップロードしてください',
        'post.work_id.required' => '作品タグを選択してください',
      ];
    }
}
