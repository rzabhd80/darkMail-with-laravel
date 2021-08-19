@extends("layouts.layout")
@section("title")
    inbox
@endsection
@section("content")
    @if($emails !=null)
        @foreach($emails as $email)
            <a href="/emails{{$email->id}}">{{$email->title}}</a>
            <br>
        @endforeach
    @else
        <p>nothing yet</p>
    @endif
@endsection
