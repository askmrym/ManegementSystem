<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model 

{
    use Sortable;

    public $sortable = ['id', 'product_name', 'compnay_name', 'price', 'stock'];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
       
    } 
    
    public function sales(){
        return $this->hasMany('App\Models\Sale');
     }  

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at',
    ];

    public function search($keyword, $company_id,$jougenprice, $kagenprice, $jougenstock, $kagenstock){
          
        $query = Product::query();
        if(!empty($keyword)){
         $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        if(!empty($company_id)){
         $query->where('company_id', 'LIKE', $company_id);
        }
        // 価格検索

        
        if($jougenprice){
            $query->where('price','<',$jougenprice);
        }
        if($kagenprice){
            $query->where('price','>',$kagenprice);
        }
        // 在庫数検索
        if($jougenstock){
            $query->where('stock','<',$jougenstock);
        }
        if($kagenstock){
            $query->where('price','>',$kagenstock);
        }
        $products = $query->sortable()->get();
        return $products;
        
    }


    //削除処理
    public function deleteProductId($id)
    {
        return $this->destroy($id);
    }    
}