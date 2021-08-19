@extends("layouts.layout")
@section("title")
    inbox
@endsection
@section("content")
    @foreach($emails as $email)
        <a href="/emails{{$email->id}}">{{$email->title}}</a>
        <br>

    @endforeach
@endsection
