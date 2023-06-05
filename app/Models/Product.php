<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
       
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

    public function serch($keyword, $company_id){
          
        $query = Product::query();
        if(!empty($keyword)){
         $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        if(!empty($company_id)){
         $query->where('company_id', 'LIKE', $company_id);
        }
        $products = $query->get();
        return $products;
    }


    //削除処理
    public function deleteProductId($id)
    {
        return $this->destroy($id);
    }    
}