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
  
    <ul class="parent">
    <?php $i=0; ?>
      @foreach ($dbtexts as $dbtext)
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <p class="card-text">
              <li>
                <?php echo $dbtext->text; ?>
                <input type="hidden" value="{{ $dbtext->text }}" class="text1" name="text{{ $i }}">
              </li>
            </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">ユーザー名 : {{ $dbtext->user_name }}</li>
          </ul>
          <div class="card-body">
            <button type="submit" class="btn btn-secondary">詳細</button>
            <button type="submit" class="btn btn-danger">削除</button>
          </div>
        </div>
      <?php $i++ ; ?>    
      @endforeach
      
    </ul>
  
  <button type="submit" class="btn btn-primary">保存</button>
</form>
</div>
@endsection