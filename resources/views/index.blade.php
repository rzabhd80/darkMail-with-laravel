@extends("layouts.layout")
@section("content")
    @if (Auth::guest())
        <h2>Dark mail service.!</h2>
        <h4>hi there..</h4>
        <p>dark mail is a safe and private electronic mail service..but a little bit of difference
        this service does not violate your privacy and unlike gmail, your data is not being sold out
        to use our serves, please <a href="#">register</a> and if you already have an account please <a href="#">sign in</a></p>
    @else
        <h3>congratulations {{Auth::user()->name}}</h3>
        <p>You have successfully logged in, now you can use our services</p>
    @endif
@endsection
