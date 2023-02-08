@extends('layouts.app')

@section('content')
<div class="auth-login-inner">
    <div class="row">
        <div class="col-md-4">
            <div class="auth-form" style="position:relative;height: 100vh">
                <div style="position:absolute;top:50%;left: 50%;transform: translate(-50%,-50%);width:100%;padding: 0px 50px;">
                    <h1 class="text-center title">{{ __('app.signin') }}</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" placeholder="{{ trans('auth.email') }}" class="form-control" name="email" value="{{ old('email') }}"  autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" placeholder="{{ trans('auth.password') }}" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('app.remember_me')}}
                                </label>
                            </div>
                            
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="width:100%;">
                                {{ trans('auth.signin') }}
                            </button>
                            <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                {{ trans('auth.forgot_password') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8" style="padding:0;">
            <div class="auth-bg" style="background: url('images/bg.jpg') no-repeat;height: 100vh;background-size: cover;">
            </div>
        </div>
    </div>
</div>
@endsection
