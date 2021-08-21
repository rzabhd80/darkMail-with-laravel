@extends("layouts.layout")
@section('title')
    EmailInfo
@endsection

@section("content")
    <ul class="list-unstyled">
        <div>
            <label>title</label>
            <li>{{$email->title}}</li>
        </div>
        <br>
        <div>
            <label>text</label>
            <li>{{$email->text}}</li>
        </div>
        <br>
        <div>
            <label>From</label>
            <li>{{$email_sender->email}}</li>
        </div>
        <br>
        <div>
            <label>TO</label>
            <li>{{$email_rec->email}}</li>
        </div>
        <br>
        @if ($email->attach != null)
            <div>
                <label>Attached file</label>
                <img src="{{asset("storage/attaches/$email->attach")}}">

            </div>
        @endif
        <hr>
        <div>
            <form class="mr-2" method="post" action="/emails/delete/{{$email->id}}">
                @method("PUT")
                @csrf
             @if (!$email->deleted)
                    <button class="btn btn-danger" type="submit">Delete</button>
             @endif
            </form>
            <form method="post" action="/emails/star/{{$email->id}}">
                @method("PUT")
                @csrf
                @if (!$email->deleted)
                    <button class="btn btn-primary" type="submit">Star</button>
                @endif
            </form>
        </div>
    </ul>
@endsection
