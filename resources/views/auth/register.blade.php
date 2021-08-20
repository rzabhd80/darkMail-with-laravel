@extends('layouts.layout')

@section('content')
    <div class="container">
        {{--    <div class="row justify-content-center">--}}
        {{--        <div class="col-md-8">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-header">{{ __('Register') }}</div>--}}

        {{--                <div class="card-body">--}}
        {{--                    <form method="POST" action="{{ route('register') }}">--}}
        {{--                        @csrf--}}

        {{--                        <div class="form-group row">--}}
        {{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

        {{--                            <div class="col-md-6">--}}
        {{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

        {{--                                @error('name')--}}
        {{--                                    <span class="invalid-feedback" role="alert">--}}
        {{--                                        <strong>{{ $message }}</strong>--}}
        {{--                                    </span>--}}
        {{--                                @enderror--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="form-group row">--}}
        {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

        {{--                            <div class="col-md-6">--}}
        {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

        {{--                                @error('email')--}}
        {{--                                    <span class="invalid-feedback" role="alert">--}}
        {{--                                        <strong>{{ $message }}</strong>--}}
        {{--                                    </span>--}}
        {{--                                @enderror--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="form-group row">--}}
        {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

        {{--                            <div class="col-md-6">--}}
        {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

        {{--                                @error('password')--}}
        {{--                                    <span class="invalid-feedback" role="alert">--}}
        {{--                                        <strong>{{ $message }}</strong>--}}
        {{--                                    </span>--}}
        {{--                                @enderror--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="form-group row">--}}
        {{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

        {{--                            <div class="col-md-6">--}}
        {{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="form-group row mb-0">--}}
        {{--                            <div class="col-md-6 offset-md-4">--}}
        {{--                                <button type="submit" class="btn btn-primary">--}}
        {{--                                    {{ __('Register') }}--}}
        {{--                                </button>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </form>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route("register")}}">
                @csrf
                <div class="form-group">
                    <label class="label">name</label>
                    <input type="text" name="name" value="{{old("name")}}"
                           class="form-control  {{$errors->has("name") ?"border-danger":""}}">
                    @if ($errors->has("name"))
                        <p class="text-danger">{{$errors->first("name")}}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="label">lastname</label>
                    <input type="text" name="lastname" value="{{old("lastname")}}"
                           class="form-control {{$errors->has("lastname") ?"border-danger":""}}">
                    @if ($errors->has("lastname"))
                        <p class="text-danger">{{$errors->first("lastname")}}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="label">email</label>
                    <div class="row col-md-12">
                        <input type="text" value="{{old("email")}}" name="email"
                               class="form-control col-md-10  {{$errors->has("email") ?"border-danger":""}}"><p class="col-md-1">  @darkMail.com</p>
                    </div>
                    @if ($errors->has("email"))
                        <p class="text-danger">{{$errors->first("email")}}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="label">backup email</label>
                    <input type="email" value="{{old("backupEmail")}}" name="backupEmail"
                           class="form-control {{$errors->has("backupEmail") ?"border-danger":""}}">
                    @if ($errors->has("backupEmail"))
                        <p class="text-danger">{{$errors->first("backupEmail")}}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="name">password</label>
                    <input type="password" name="password"
                           class="form-control {{$errors->has("password") ?"border-danger":""}}">
                    @if ($errors->has("password"))
                        <p class="text-danger">{{$errors->first("password")}}</p>
                    @endif
                </div>

                <div>
                    <label for="password-confirm"
                    >{{ __('Confirm Password') }}</label>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>

                <hr>
                <div>
                    <button class="btn btn-secondary" type="submit">register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
