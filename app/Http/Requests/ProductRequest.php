<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'company_id'=> ['required'],
            'product_name' => ['required'],  
            'price' => ['required'],  
            'stock' => ['required'], 
            'comment' => ['nullable'],
            'img_path' => ['nullable'], 
        ];
    }
       //項目名
       public function attributes()
       {
           return [
               'company_id' => '会社ID',
               'product_name' => '商品名',
               'price' => '価格',
               'stock' => '在庫数',
               'comment' => 'コメント',
               'img_path' => '画像' 
           ];
       }
   
       //エラーメッセージ
       public function message() {
           return [
               'company_id.required' => ':attributeは必須項目です',
               'product_name.required' => ':attributeは必須項目です',
               'price.required' => ':attributeは必須項目です',
               'stock.required' => ':attributeは必須項目です',
           ];
       }
   }

