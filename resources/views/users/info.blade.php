@extends("layouts.layout")
@section("title")
    accountInfo
@endsection
@section("content")
    <div>
        <div class="rounded ml-5 justify-content-center ml-4"><img id="avatar" src="{{asset("storage/profiles/$user->profile")}}"  alt="avatar"></div>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">lastname</th>
                <th scope="col">email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <a href="{{route("password.request")}}" class="btn btn-primary mr-3">reset password</a>
            <a href="/users/uploadProfile" class="btn btn-primary">upload profile</a>
        </div>
    </div>
@endsection
