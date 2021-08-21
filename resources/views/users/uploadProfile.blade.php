@extends('layouts.layout')
@section("title")
    upload profile
@endsection
@section("content")
    <form method="post" enctype="multipart/form-data" action="users/editProfile">
        @csrf
        @method("PUT")
        <input type="file" name="profile" class="form-control-file">
        <br>
        <button class="btn btn-success" type="submit">upload</button>
    </form>
@endsection
