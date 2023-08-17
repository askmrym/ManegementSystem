<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Carbon;


class ProductService
{
  public function __construct()
  {
  }
  public function delete($id)
  {
    $product = Product::findOrFail($id);
    $product->delete_at = Carbon::now()->format("Y-m-d H:i:s");
    $product->save();
  }

}