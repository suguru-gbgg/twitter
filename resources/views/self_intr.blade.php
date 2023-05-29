@extends('layouts.app')

@section('content')
    @if(!is_null($self_text))
        <form action="MainController" method="post">
        @csrf
            <div class="mx-auto" style="width: 20rem">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="card-text">
                            <textarea id="text" cols="33" rows="5" class="form-control" value="" name="self">
                                {{ $self_text }}
                            </textarea>
                        </p>
                        <input type="hidden" name="user_name" value="{{ Auth::user()->name; }}" id="user_name">
                        <button type="submit" id="addbtn" class="btn btn-outline-primary text-center">更新</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <form action="MainController" method="post">
        @csrf
            <div class="mx-auto" style="width: 20rem">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="card-text">
                            <textarea id="text" cols="33" rows="5" class="form-control" value="" name="self"></textarea>
                        </p>
                        <input type="hidden" name="user_name" value="{{ Auth::user()->name; }}" id="user_name">
                        <button type="submit" id="addbtn" class="btn btn-outline-primary text-center">新規作成</button>
                    </div>
                </div>
            </div>
        </form>
    @endif    
@endsection