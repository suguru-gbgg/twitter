@extends('layouts.app')

@section('content')
<input type="text" class="text" value="" name="text">
<button type="button" class="addbtn">送信</button>
<form action="MainController" method="post">
@csrf
    <ul class="parent"></ul>
    <button type="submit" >保存</button>
</form>
@endsection