@extends('layouts.app')

@section('content')
<h1>編集画面</h1>
<form action="{{ route('update', $products->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  <fieldset>
  
    <div class="form-group">
     <div>
      <label for="product_name">商品名</label>
     <input type="text" class="form-name" name="product_name" id="product_name" value="{{ old('product_name', $products->product_name)}}">
       @if($errors->has('product_name'))
        <p>{{ $errors->first('product_name') }}</p>
        @endif
     </div>
     <div>
     <label for="company_id">メーカー名</label>
    <select class="form_company" id="company_id" name="company_id">
      @foreach($companies as $company)
      <option value="{{$company->id }}" @if (old('comppany_id', $products->company_id) == $company->id) selected @endif>
      {{$company->company_name}} 
      </option>
        @endforeach
         </select>
         @if($errors->has('company_id'))
        <p>{{ $errors->first('company_id') }}</p>
        @endif
     </div>
    <div>
    <label for="price">価格</label>
    <input type="text" class="form-price" name="price" id="price" value="{{ old('price', $products->price)}}">
    @if($errors->has('price'))
        <p>{{ $errors->first('price') }}</p>
        @endif
    </div>
   <div>
   <label for="stock">在庫数</label>
    <input type="text" class="form-stock" name="stock" id="stock" value="{{ old('stock', $products->stock)}}">
    @if($errors->has('stock'))
        <p>{{ $errors->first('stock') }}</p>
        @endif
   </div>
    <div>
    <label for="comment">コメント</label>
    <input type="textarea" class="form-comment" name="comment" id="comment" value="{{ old('comment', $products->comment)}}"> 
    </div>
    <div> 
    <label for="img_path">画像</label>
      <input type="file" class="form-img" name="img_path" id="img_path">
      <div>
      <p>※現在登録中の画像</p>
      <img src="{{asset('storage/'.$products->img_path) }}" width=25%>
      </div>  
    </div>
      <div>

      </div>
    <div class="d-flex justify-content-between pt-3">
      <a href="{{ route('list')}}" class="btn btn-outline-secondary" role="button">
        <i class="fa fa-replay mr-1" aria-hidden="true"></i>{{__('一覧画面へ')}}
      </a>
      <button type="submit" class="btn btn success">
        {{__('更新')}}
      </button>
      </div>
    </div>
  </fieldset>
</form>

@endsection
