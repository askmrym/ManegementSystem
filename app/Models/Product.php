<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function getList() {
        $products = DB::table('products')->get();

        return $products;

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


    public function findAllProducts()
    {
        return Product::all();
    }

    public function InsertProduct($request)
    {
        return $this->create([
            'product_name' =>$request->product_name,
            'company_id' =>$request->company_id,
            'price' =>$request->price,
            'stock' =>$request->stock,
            'comment' =>$request->comment,
            'img_path' =>$request->img_path,
        ]);
    }
}
