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



    //削除処理
    public function deleteProductId($id)
    {
        return $this->destroy($id);
    }    
}