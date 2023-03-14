@extends('layouts.app')

@section('content')
    @foreach ($db_text as $db_text)
        <div class="card my-3 mx-auto" style="width: 20rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">{{ $db_text->user_name }}</li>
                <li class="list-group-item text-center">{{ $db_text->text }}
                <input type="hidden" value="{{ $db_text->id }}" name="text_id">
                </li>
            </ul>
        </div>
    @endforeach 
@endsection