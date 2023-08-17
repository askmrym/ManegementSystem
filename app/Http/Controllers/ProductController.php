<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CompanayRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->product = new Product();
    }

    public function showList(Request $request) {

        

          //検索機能  
          $keyword = $request->input('keyword');
          $company_id = $request->input('company_id');  
          $jougenprice = $request->input('jougenprice');
          $kagenprice = $request->input('kagenprice');
          $jougenstock = $request->input('jougenstock');
          $kagenstock = $request->input('kagenstock');
       
       
       $products = $this->product
       ->serch($keyword, $company_id, $jougenprice, $kagenprice, $jougenstock, $kagenstock);
       

       //会社名DB取得
       $companies = Company::all(); 
       
       

        return view('list',[
            'products' => $products,
            'keyword' => $keyword,
            'company_id' => $company_id,
            'companies' => $companies,
            'jougenprice' => $jougenprice,
            'kagenprice' => $kagenprice,
            'jougenstock' => $jougenstock,
            'kagenstock' => $kagenstock
        ]);
        

}

    //詳細画面
    public function showDetail($id) {
        $products = product::find($id);
        return view('detail' ,[
            'products' => $products
        ]);
    }

    //更新画面
    public function edit($id){
        $products = Product::find($id);
        $companies = Company::all();
        return view('edit', [
            'products'=> $products,
            'companies' => $companies
        ]);   
    }
    //更新処理
   public function update(ProductRequest $request, $id)
   {
    
    $products = Product::find($id);
    $img_path = '';

    $img_cur = $products->img_path;

    $data = [
        'product_name' =>$request->product_name,
        'company_id' =>$request->company_id,
        'price' =>$request->price,
        'stock' =>$request->stock,
        'comment' =>$request->comment,

    ];
    
    if($request->hasfile('img_path'))
    {
        if ($img_cur !== '' && !is_null($img_cur)){
            Storage::disk('public')->delete($img_cur);
    }

    $img_path = $request->file('img_path')->store('image','public');
    $data['img_path'] = $img_path;
    }
    try{
    
        DB::beginTransaction();
    
    $products->update($data);
    DB::commit();
    }catch (Exception $e) {
    DB::rollBack();
    }
    return redirect()->route('detail', $products->id);
    }

    //削除機能
    public function delete($id){
        {
            try{
                $this->product->delete($id);
                $status = "success";
                $message = "削除が完了しました";
                $returnArr = [
                    'status' => $status,
                    'message' => $message
                ];
                return response()->json($returnArr);

            }catch(\Trowable $th){
               $status= "error";
               $message = '削除に失敗しました';
               $returnArr=[
                'status'=> $status,
                'message' => $message
               ];

            return response()->json($returnArr);
            }
        }
    }


    public function create(Request $request)
    {   
        $companies = Company::with('products')->get();
        return view('create',[  
        'companies'=> $companies,
        ]);
    }

   //新規商品登録処理
    public function store(ProductRequest $request){
        try{
        DB::beginTransaction();
        $data = $request->validated();

        $img_path = '';
        if ($request->hasfile('img_path'))
        {
            $img_path = $request->file('img_path')->store('image','public');
            $data['img_path'] = $img_path;
        }
        
        Product::create($data);
        DB::commit();
    }
    catch (\Exception $e) {
        DB::rollback();
        return back();
    }
        return redirect()->route('create')->with('flash_message', '登録が完了しました');
        }
        

    }