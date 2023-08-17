<?php

namespace App\Http\Controllers\API;

use App\Models\Sale;
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

}
