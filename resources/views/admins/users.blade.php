@extends("layouts.layout")
@section("title")
    users
@endsection
@section("content")
    <table class="table">
        <thead>
        <tr>
            <th>User</th>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->email}}></td>
                <td><form method="post" action="#">@csrf <button class="btn btn-danger" type="submit">Delete</button></form></td>
                <td><a href="users/{{$user->id}}" class="btn btn-secondary">Detail</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
