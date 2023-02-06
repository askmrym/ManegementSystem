@extends('layouts.app')

@section('content')

<div class="small container">
  <h1>商品登録</h1>
  <form action="{{ route('product.store') }}" method="POST">
  @csrf
  <fieldset>
    <div class="form-group">
      <table>
        <tr>
          <th><label for="product_name">商品名</label></th>
          <th><label for="company_id">メーカー名</label></th>
          <th><label for="price">価格</label></th>
          <th><label for="stock">在庫数</label></th>
          <th><label for="comment">コメント</label></th>
          
        </tr>
        <tr>
          <td><input type="text" class="form-name" name="product_name" id="product_name"></td>
          <td><select class="form_company" id="company_id" name="company_id" size="2"></select>
          <option value="">あ</option>
          <option value="">い</option>
          <option value="">う</option>
          <option value="">え</option>
        </td>
          <td><input type="text" class="form-price" name="price" id="price"></td>
          <td><input type="text" class="form-stock" name="stock" id="stock"></td>
          <td><input type="textarea" class="form-comment" name="comment" id="comment"></td>
        </tr>
      </table>
       
    </div>
    <div class="d-flex justify-content-between pt-3">
      <a href="{{ route('list')}}" class="btn btn-outline-secondary" role="button">
        <i class="fa fa-replay mr-1" aria-hidden="true"></i>{{__('一覧画面へ')}}
      </a>
      <button type="submit" class="btn btn success">
        {{__('登録')}}
      </button>

    </div>
    
  </div>

  
</fieldset>

</form>
</div>
@endsection


