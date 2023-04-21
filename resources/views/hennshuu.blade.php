@extends('layouts.app')

@section('content')
    @foreach ($db_text as $db_text)
        <form action="kousin" method="post">
        @csrf
            <div class="card mx-auto" style="width: 500px;  min-height: 300px;">
                <div class="card-header text-center">
                    {{ $db_text->user_name }}
                </div>
                <div class="card-body">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="text" maxlength="255">{{ $db_text->text }}</textarea>
                    <div class="d-grid gap-2 col-2 mx-auto mt-3">
                        <button type="submit" class="btn btn-outline-info">更新</button>
                        <input type="hidden" name="text_id" value="{{ $db_text->id }}">
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection