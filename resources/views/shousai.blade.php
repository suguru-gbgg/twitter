@extends('layouts.app')

@section('content')
    @foreach ($db_text as $db_text)
        <div class="card mx-auto" style="width: 500px;  height: 300px;">
            <div class="card-header text-center">
                {{ $db_text->user_name }}
            </div>
            <div class="card-body text-center" style="display: flex; justify-content: center; align-items: center;">
                <p class="card-text">{{ $db_text->text }}</p>
            </div>
        </div>
    @endforeach
@endsection