@extends('layouts.app')

@section('content')
<div class="small container">
  <h1>商品登録</h1>
  <form action="{{ route('store') }}" method="POST">
  @csrf
  <fieldset>
    <div class="form-group">
      <label for="product_name">商品名</label>
      <input type="text" class="form-name" name="product_name" id="product_name">
      <label for="company_id">メーカー名</label>
      <select class="foem_company" id="company_id" name="company_id">
        @foreach($products as $product)
          <option value="{{ $product->company_id}}">{{ $product->company_id}}</option>
        @endforeach
      </select>
    </div>
  </fieldset>

  </form>
</div>
@endsection


