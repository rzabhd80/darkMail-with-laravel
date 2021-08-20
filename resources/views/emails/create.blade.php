@extends("layouts.layout")
@section("title")
    newMail
@endsection
@section("content")
    <div class="row">
        <form action="/emails/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" form-group">
                <label>receiver</label>
                <input type="email" name="receiver" value="{{old("receiver")}}"
                       class="form-control {{$errors->has("receiver")?"border-danger":""}}">
                @if($errors->has("receiver"))
                    <p class="text-danger">{{$errors->first("receiver")}}</p>
                @endif
            </div>
            <div class="form-group">
                <label>title</label>
                <input type="text" name="title" value="{{old("title")}}"
                       class="form-control {{$errors->has("receiver")?"border-danger":""}}">
                @if($errors->has("receiver"))
                    <p class="text-danger">{{$errors->first("receiver")}}</p>
                @endif
            </div>

            <div class="form-group">
                <label>text</label>
                <textarea name="text"
                          class="form-control {{$errors->has("text")?"border-danger":""}}"></textarea>
                @if($errors->has("text"))
                    <p class="text-danger">{{$errors->first("text")}}</p>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label>Attach</label>
                <input type="file" name="attach" class="form-control">
                @if($errors->has("attach"))
                    <p class="text-danger">{{$errors->first("attach")}}</p>
                @endif
            </div>
            <hr>
            <button class="btn btn-secondary" type="submit">send</button>
        </form>
    </div>
@endsection
