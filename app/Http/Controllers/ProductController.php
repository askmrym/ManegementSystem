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

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $registerProduct = $this->product->InserProduct($request);
        return redirect()->route('list');
    }

    public function img(Request $request){
        $img = $request->file('img_path');
        if(isset($img)){
            $path = $img->store('img','public');
        }
        if($path){
            Product::create([
                'img_path' => $path,
            ]);
        }
        return redirect()->route('create');
    }

    public function destroy($id)
    {
        $product = product::find($id);

        $product->delete();

        return redirect()->route('list');
        }
}


