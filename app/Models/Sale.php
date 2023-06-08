<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sale extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
       
    } 

    protected $table = 'sales';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'created_at',
        'updated_at',
    ];
}
