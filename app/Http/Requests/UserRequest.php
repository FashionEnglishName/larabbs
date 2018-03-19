<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200'
        ];
    }

    public function messages(){
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名只支持英文，数字，下划线和横杠',
            'name.between' => '用户名介于 3 - 25 个字符之间',
            'name.unique' => '用户名已被占用',
            'avatar.mime' => '头像必须是jpeg,bmp,png,gif格式',
            'avatar.dimensions' => '头像宽和高要求 200px 以上',
        ];
    }
}
