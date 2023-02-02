@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
          <input type="text" id="text" class="text-center" value="" name="text" placeholder="なにか入力してください">
          <button type="button" id="addbtn" class="btn btn-primary">追加</button>
      </div>
      <div class="col-sm"></div>     
  </div>
</div>

<div class="mx-auto">
<form action="MainController" method="post">
@csrf
  
    <ul class="parent container">
      <div class="row flex-row">
      <?php $i=0; ?>
        @foreach ($dbtexts as $dbtext)
        <div class="col-3">
          <div class="card mt-4"> 
            <div class="card-body">
              <h5 class="card-title">{{ $dbtext->text; }}</h5>
              <p class="card-text">{{ $dbtext->user_name; }}</p>
              <button type="submit" class="btn btn-secondary">詳細</button>
              <button type="submit" class="btn btn-danger">削除</button>
            </div>
            </div>
          </div>
          <?php $i++ ; ?>    
        @endforeach
      </div> 
    </ul>
    
  <button type="submit" class="btn btn-primary">保存</button>
</form>
</div>
@endsection