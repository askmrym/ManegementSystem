@extends('layouts.app')

@section('content')

<h1>商品一覧</h1>

  <a href="{{ route('create') }}">新規商品登録</a>

  <form action="{{ route('list') }}" method="GET">
    @csrf

  <!-- 検索機能 -->
    <div>
    <label for="keyword">商品名
      <div>
    <input type="text" name="keyword" value="{{ $keyword }}">
    </div>
    </label>  
  </div>
  <div>
    <label for="company_id">メーカー名
      <div>
        <select class="form_company" id="company_id" name="company_id">
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
        <input type="number" name="jougenprice" id="jougenprice" value="{{ $jougenprice }}">
      </div>
      <div class="kagen">
        <label>下限</label>
        <input type="number" name="kagenprice" id="kagenprice" value="{{ $kagenprice }}">
      </div>
    </div>

    <div class="stock.search">
      <label for="stock">在庫数</label>
       <div class="jougen">
        <label>上限</label>
        <input type="number" name="jougenstock" id="jougenstock" value="{{ $jougenstock }}">
      </div>
      <div class="kagen">
        <label>下限</label>
        <input type="number" name="kagenstock" id="kagenstock" value="{{ $kagenstock }}">
      </div>
    </div>
  </div>
  <div>
    <button type="submit">検索</button>
    <button>
      <a href="{{ route('list')}}" class="text-white">
        クリア
      </a>
    </button>
  </div>
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
        <tbody>
        @foreach($products as $product)
        @csrf
        <tr  id="row_{{ $product->id }}">
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
            
              <button  data-product_id="{{$product->id}}" type="submit" class="btn btn-danger" id='delete_button_{{ $product->id}}'>削除</button> 
              </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    
        <script>
$( function ()
{
  $( "[id^=delete_button]" ).on( "click", function ()
  {
    const id = $(this).attr("id").substr(14);
    console.log(id);
    

    //csrf対策
    $.ajaxSetup( {
      headers: {
        'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
      }
    });
    if ( confirm('本当に削除してもいいですか？'))
    {
       $.ajax({
        type: "post",
        url: "{{ route('list.delete' , $product->id) }}", 
        dataType: 'json',
        data: { "id":id, "_method": "DELETE" }
       })
       //成功時の処理
      

       .done((res) =>
       {
        if (res ['status'] == "success" )
        {

          $("#row_${ id }" ).remove();
          flashMessage( id, res['status'], res['message'] );
        }
       })

       .fail( function ( jqXHR, textStatus, errorThrown )
       {
        console.log( jqXHR );
                    console.log( textStatus );
                    console.log( errorThrown );
                    flashMessage( id, 'error', '削除に失敗しました。' );
       });
      }
      });
        function flashMessage ( id, status, message )
        {
          let bgColor = 'bg-red-300';
          let dom = `<div id ="flash_${ id }" class="${ bgColor } w-1/2 mx-auto mb-4 p-2 text-white">
           ${ message }
        </div>`;
        if ( status == "error" )
        {
            $( ".container" ).append( dom );
        } else
        {
            bgColor = 'bg-blue-300';
            dom = `<div id ="flash_${ id }" class="${ bgColor } w-1/2 mx-auto mb-4 p-2 text-white">
           ${ message }
        </div>`;
            $( ".container" ).append( dom );
        }
        setTimeout( function ()
        {
            $( `#flash_${ id }` ).remove();
        }, 2000 );
        }

      

})
         
    </script>
    
    
    
    

  </div>

  @endsection