@extends('layouts.app')

@section('content')
<div class="container">
  <ul class="parent">
    <div class="mx-auto"  style="width: 20rem">
      <div class="card">
        <div class="card-body text-center">
          <p class="card-text">
            <textarea id="text" cols="33" rows="5" class="text-center" value="" name="text"></textarea>
          </p>
          <button type="button" id="addbtn" class="btn btn-outline-primary text-center">ツイート</a>
        </div>
    </div>
  </ul>
</div>

<form action="MainController" method="post">
@csrf
  <ul class="parent">
    <?php $i=0; ?>
    @foreach ($db_texts as $db_text)
      <div class="card my-3 mx-auto" style="width: 20rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center">{{ $db_text->user_name }}</li>
          <li class="list-group-item text-center">{{ $db_text->text }}
            <div class="dropdown">
              <h7 class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></h7>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">詳細</a></li>
                <li><a class="dropdown-item" href="#">削除</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    @endforeach 
  </ul>
</form>
</div>
@endsection