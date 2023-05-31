@extends('layouts.app')

@section('content')
<h1>詳細確認</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>商品情報ID</th>
      <th>商品画像</th>
      <th>商品名</th>
      <th>メーカー</th>
      <th>価格</th>
      <th>在庫数</th>
      <th>コメント</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $products->id }}</td>
      <td><img src="{{asset('storage/'.$products->img_path) }}" width=25%></td>
      <td>{{ $products->product_name }}</td>
      <td>{{ $products->company->company_name }}</td>
      <td>{{ $products->price }}</td>
      <td>{{ $products->stock }}</td>
      <td>{{ $products->comment }}</td>
    </tr>
  </tbody>
</table> 
<a href="{{ route('edit', ['id'=>$products->id]) }}" class="btn btn-outline-secondary" role="button">
        <i class="fa fa-replay mr-1" aria-hidden="true"></i>{{__('編集')}}
      </a>
      <a href="{{ route('list')}}" class="btn btn-outline-secondary" role="button">
        <i class="fa fa-replay mr-1" aria-hidden="true"></i>{{__('戻る')}}
      </a>
        
@endsection
