<?php

namespace App\Http\Controllers\API;

use App\Models\Sale;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        try {
            $version = Sale::first();
            $result = [
                'result' => true,
                'version' => $version->product_id
            ];
        } catch(\Exception $e){
            $result = [
                'result' => false,
                'error' => [
                    'messages' => [$e->getMessage()]
                ],
            ];
            return $this->resConversionJson($result, $e->getCode());
        } 
        return $this->resConversionJson($result);
    }
    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result,$statusCode,['Content-Type' =>  'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function purchase(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity',1);

        $product = Product::find($product_id);


        if (!$product) {
            return response()->json(['message' => '商品が存在しません。'], 404);
        }
        if ($product->stock < $quantity) {
            return response()->json(['message' => '商品が在庫不足です。'],400);
        }

        $product -> stock -= $quantity;
        $product->save();

        $sale = new Sale([
            'product_id' => $product_id,
        ]);

        $sale->save();

        return response()->json(['message'=>'購入成功']);

    }

}
