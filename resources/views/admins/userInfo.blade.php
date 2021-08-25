@extends("layouts.layout")
@section("title")
    userDetail
@endsection
@section("content")
    <table class="table">
        @if ($user->profile != null)
            <img id="avatar" src="{{asset("storage/profiles/$user->profile")}}">
            <br>
            <hr>
        @endif
        <thead>
        <tr>
            <th>Email</th>
            <th>name</th>
            <th>lastname</th>
            <th>backup Email</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->backupEmail}}</td>
        </tr>
        </tbody>
    </table>
@endsection
