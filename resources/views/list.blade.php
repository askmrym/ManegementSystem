@extends('layouts.app')

@section('content')

<h1>商品一覧</h1>

  <a href="{{ route('create') }}">新規商品登録</a>
  
  <form action="{{ route('list') }}" method="GET">
    @csrf
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
          <th>商品ID</th>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>メーカー名</th>
          <th>詳細</th>
          <th>削除</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        @csrf
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{asset('storage/'.$product->img_path) }}" width=25%></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
  
              {{$product->company->company_name }}
              </td>
            <td>
              <a href="{{ route('detail' , ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a>
            </td>
          
            <td>
            <form action="{{route('list.destroy', ['id'=>$product->id])}}" method="POST" id="delete_post">
              @csrf
              
              <button type="submit" class="btn btn-danger">削除</button> 
              </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <script>
         'use strict';

          {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();
                if (!confirm('本当に削除しますか？')) {
                    return;
                }
                e.target.submit();
            });
          }
    </script>
    
    
    
    

  </div>

  @endsection