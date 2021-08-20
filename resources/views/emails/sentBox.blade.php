@extends("layouts.layout")
@section("title")
    inbox
@endsection
@section("content")
    @if($emails !=null)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Emails</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($emails as $email)
                <tr>
                    <td>{{$email->title}}</td>
                    <td>
                        <form method="post" action="/emails/delete"> @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/emails/star"> @csrf
                            <button class="btn btn-primary">Star</button>
                        </form>
                    </td>
                    <td>
                        <a href="/emails/{{$email->id}}" class="btn btn-secondary">Detail</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
