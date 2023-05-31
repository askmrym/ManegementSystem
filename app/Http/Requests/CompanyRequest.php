<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //ルール
    public function rules()
    {
        return [
            'company_name'=> 'required',
            'street_address' => 'required',  
            'representative_name' => 'required',  
        ];
    }

    //項目名
    public function attributes()
    {
        return [
            'company_name' => '会社名',
            'street_address' => '住所',
            'representative_name' => '代表名',
        ];
    }

    //エラーメッセージ
    public function message() {
        return [
            'company_name.required' => ':attributeは必須項目です',
            'street_address.required' => ':attributeは必須項目です',
            'representative_name.required' => ':attributeは必須項目です',
        ];
    }
}
