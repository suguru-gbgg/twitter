@extends('layouts.app')

@section('content')
<div class="container">
  <form action="MainController" method="post">
  @csrf
    <div class="mx-auto" style="width: 20rem">
      <div class="card">
        <div class="card-body text-center">
          <p class="card-text">
            <textarea id="text" cols="33" rows="5" class="text-center" value="" name="text"></textarea>
          </p>
          <input type="hidden" name="user_name" value="{{ Auth::user()->name; }}" id="user_name">
          <button type="submit" id="addbtn" class="btn btn-outline-primary text-center">ツイート</a>
        </div>
      </div>
    </div>
  </form>
  <div class="parent">
    <?php $i=0; ?>
    @foreach ($db_texts as $db_text)
      <div class="card my-3 mx-auto" style="width: 20rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center">{{ $db_text->user_name }}</li>
          <li class="list-group-item text-center">{{ $db_text->text }}
            <input type="text" value="{{ $db_text->id }}" name="text_id">
            <div class="dropdown">
              <h7 class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></h7>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <form action="shousai" method="post">
                @csrf
                  <li><button type="submit" class="dropdown-item">詳細</button></li>
                </form>
                <form action="delete" method="post">
                  <li><button type="submit" class="dropdown-item">削除</a></li>
                </form>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    @endforeach 
  </div>
</div>
@endsection