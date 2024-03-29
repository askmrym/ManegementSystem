@extends('layouts.app')

@section('content')

<h1>商品一覧</h1>

  <a href="{{ route('create') }}">新規商品登録</a>

  <form  method="GET">
    @csrf

  <!-- 検索機能 -->
    <div>
    <label for="keyword">商品名
      <div>
    <input class="search" type="text" id="product_name" name="keyword" value="{{ $keyword }}">
    </div>
    </label>  
  </div>
  <div>
    <label for="company_id">メーカー名
      <div>
        <select class="search form_company" id="company_id" name="company_id">
           @foreach($companies as $company)
          <option value="{{ $company->id }}">
          {{$company->company_name}}
          </option>
          @endforeach
        </select>
      </div>
    </label>

    <div class="price.search">
      <label for="price">価格</label>
       <div class="jougen">
        <label>上限</label>
        <input type="number" name="jougenprice" id="jougenprice" class="search" value="{{ $jougenprice }}">
      </div>
      <div class="kagen">
        <label>下限</label>
        <input type="number" name="kagenprice" id="kagenprice" class="search" value="{{ $kagenprice }}">
      </div>
    </div>

    <div class="stock.search">
      <label for="stock">在庫数</label>
       <div class="jougen">
        <label>上限</label>
        <input type="number" name="jougenstock" id="jougenstock" class="search" value="{{ $jougenstock }}">
      </div>
      <div class="kagen">
        <label>下限</label>
        <input type="number" name="kagenstock" id="kagenstock" class="search" value="{{ $kagenstock }}">
      </div>
    </div>
  </div>
  <div>
  <button  type="button" class="btn btn-search" id="search_button">検索</button> 
    
    <button>
      <a href="{{ route('list')}}" class="text-white">
        クリア
      </a>
    </button>
  </div>
  {{ csrf_field() }}
</form>

  

  


  <div class="links">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">@sortablelink('id', '商品ID')</th>
          <th scope="col">@sortablelink('img_path', '商品画像')</th>
          <th scope="col">@sortablelink('product_name', '商品名')</th>
          <th scope="col">@sortablelink('price', '価格')</th>
          <th scope="col">@sortablelink('stock', '在庫数')</th>
          <th scope="col">@sortablelink('company_name', 'メーカー名')</th>
          <th>詳細</th>
          <th>削除</th>
        </tr>
        </thead>
        <tbody class='list'>
        @foreach($products as $product)
        @csrf
        <tr  id="row_{{ $product->id }}" class='result_data'>
            <td class="px-4 py-3">{{ $product->id }}</td>
            <td class="px-4 py-3"><img src="{{asset('storage/'.$product->img_path) }}" width=25%></td>
            <td class="px-4 py-3">{{ $product->product_name }}</td>
            <td class="px-4 py-3">{{ $product->price }}</td>
            <td class="px-4 py-3">{{ $product->stock }}</td>
            <td class="px-4 py-3">
  
              {{$product->company->company_name }}
              </td>
            <td class="px-4 py-3">
              <a href="{{ route('detail' , ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a>
            </td>
          
            <td class="px-4 py-3">
            
              <button  data-product-id="{{$product->id}}" type="submit" class="btn btn-danger" id='delete_button_{{ $product->id}}'>削除</button> 
              </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    
        <script>

//検索機能
$(function(){


  $("#search_button").on('click' ,  function () {
    
 var keyword = $("#product_name").val();
 var companyName = $("#company_id").val();
 var jougenprice = $("#jougenprice").val();
 var kagenprice = $("#kagenprice").val();
 var jougenstock = $("#jougenstock").val();
 var kagenstock = $("#kagenstock").val();

 if(!keyword & companyName & jougenprice & kagenprice & jougenstock & kagenstock){
  return false;
 }//検索ワードが全てからの時はなにも返さない

 $.ajax({
  type: 'GET',
  url: "{{ route('list') }}",
  dataType: 'html',
  data:{
    'product_name' : keyword,
    'company_id' : companyName,
    'jougenprice' : jougenprice,
    'kagenprice' :kagenprice,
    'jougenstock' : jougenstock,
    'kagenstock' : kagenstock
  },

  

 }).done(function (data) {

  let products = $(data).find('.links');
  $('.links').html(products);
  
  
 })

})



//削除機能


  $("[id^=delete_button]").on('click' , function(event){
     var productid = $(this).data( 'product-id' )
     console.log(productid);
     event.preventDefault();
     var clickEle = $(this);
     $.ajax({
      headers: {'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )},
      url: "delete" + productid,
      type: "POST",
      data: { "_method": "DELETE" },
      dataType: "html",
      success: function(){
        clickEle.parents("tr").remove();      
      },
      error: function(xhr){
          console.log(xhr);
      }
     });
  });
})




         
    </script>
    
    
    
    

  </div>

  @endsection