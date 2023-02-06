@extends('layouts.app')

@section('content')

<h1>商品一覧</h1>

  <a href="{{ route('create') }}">新規商品登録</a>



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
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_id }}</td>
            <td>
              <a href="{{ route('detail' , ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a>
            </td>
          
            <td>
            <form action="{{route('list.destroy', ['id'=>$product->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger">削除</button> 
              </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    

  </div>

  @endsection