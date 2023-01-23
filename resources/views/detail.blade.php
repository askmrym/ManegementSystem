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
      <td>{{ $product->id }}</td>
      <td>{{ $product->img_path }}</td>
      <td>{{ $product->product_name }}</td>
      <td>{{ $product->company_id }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->stock }}</td>
      <td>{{ $product->comment }}</td>
    </tr>
  </tbody>
</table>
      @if (Route::has('list'))
        <a href="{{ route('list') }}">戻る</a>
      @endif
@endsection
