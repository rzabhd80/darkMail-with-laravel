@extends("layouts.layout")
@section('title')
    EmailInfo
@endsection

@section("content")
    <table class="table">
        <thead>
        <tr>
            <th scope="col">sender</th>
            <th scope="col">receiver</th>
            <th scope="col">title</th>
            <th scope="col">text</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$email_sender->email}}</td>
            <td>{{$email_sender->email}}</td>
            <td>{{$email->title}}</td>
            <td>{{$email->text}}</td>
        </tr>
        </tbody>
    </table>
@endsection
