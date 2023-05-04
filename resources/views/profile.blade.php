@extends('layouts.app')

@section('content')
<div class="parent">
    <?php $i=0; ?>
    @foreach ($db_texts as $db_text)
      <div class="card my-3 mx-auto" style="width: 20rem; height: 15rem; overflow: hidden;" >
        <ul class="list-group list-group-flush">
        <div class="card-header text-center">{{ $db_text->user_name }}</div>
          <li class="list-group-item text-center" style="height: 10rem; my-auto">{{ $db_text->text }}</li>
          <li class="list-group-item text-center">
            <input type="hidden" value="{{ $db_text->id }}" name="text_id">
            <div class="dropdown">
              <h7 class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></h7>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <form action="shousai" method="post">
                @csrf
                  <li>
                    <button type="submit" class="dropdown-item">詳細</button>
                    <input type="hidden" name="text_id" value="{{ $db_text->id }}">
                  </li>
                </form>
                <form action="hennshuu" method="post">
                @csrf
                  <li>
                    <button type="submit" class="dropdown-item">編集</button>
                    <input type="hidden" name="text_id" value="{{ $db_text->id }}">
                  </li>
                </form>
                <form action="sakujo" method="post">
                @csrf
                  <li>
                    <button type="submit" class="dropdown-item">削除</button>
                    <input type="hidden" name="text_id" value="{{ $db_text->id }}">
                  </li>
                </form>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    @endforeach 
  </div>
@endsection