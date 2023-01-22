<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showList() {
        $model = new Product();
        $products = $model->getList();

        return view('list', ['products' => $products]);

    }

    public function showDetail($id) {
        $product = product::find($id);

        return view('detail' , compact('product'));

    }

    public function destroy($id)
    {
        $product = product::find($id);

        $product->delete();

        return redirect()->route('list');
        }
}


