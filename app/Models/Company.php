<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
 public function products(){
    return $this->hasMany('App\Models\Product');
 }   


 protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'company_name',
        'street_address',
        'represenative_name',
        'created_at',
        'updated_at',
    ];

}
