<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string|between:2,32',
            'url' => 'sometimes|url|max:200',
            'picture' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => '标题字段不能为空',
          'title.string' => '标题字段仅支持字符串',
          'title.between' => '标题字段长度必须介于2-32之间',
          'url.url' => 'url格式不正确，请输入正确的url啊',
          'url.max' => 'url长度不能超过200个字符',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题aaa',
            'url' => 'URL',
            'picture' => '图片',
        ];
    }

}
