<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'gender'      => ['required', 'in:1,2,3'],
            'email'       => ['required', 'email', 'max:255'],
            'tel'         => ['required', 'regex:/^[0-9]{1,11}$/'],
            'address'     => ['required', 'string', 'max:255'],
            'building'    => ['nullable', 'string', 'max:255'],
            'detail'      => ['required', 'string', 'max:120'],
            'tag_ids'     => ['nullable', 'array'],
            'tag_ids.*'   => ['exists:tags,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required'=> 'お問い合わせの種類を入力してください。',
            'first_name.required' => '苗字を入力してください。',
            'last_name.required'  => '名前を入力してください。',
            'gender.required'     => '性別を選択してください。',
            'email.required'      => 'メールアドレスを入力してください。',
            'email.email'         => 'メールアドレスを@を使用して入力してください。',
            'tel.required'        => '電話番号を入力してください。',
            'tel.regex'           => '電話番号は11桁で入力してください。',
            'address.required'    => '住所を入力してください。',
            'detail.max'          => '内容は120文字以内で入力してください。',
            'detail.required'     => '内容を入力してください。',
        ];
    }
}
