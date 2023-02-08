@extends('layouts.app')

@section('content')
<div class="auth-register-inner">
    <div class="row">
        <div class="col-md-4" style="padding:0">
            <div class="auth-form" style="position:relative;height: 100vh">
                <div style="position:absolute;top:50%;left: 50%;transform: translate(-50%,-50%);width:100%;padding: 0px 50px;">
                    <h1 class="text-center title">{{ __('app.signup') }}</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
    
                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
    
                            <input id="nickname" type="text" placeholder="{{ trans('user.nickname') }}" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>
    
                            @if ($errors->has('nickname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nickname') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    
                            <input id="name" type="text" placeholder="{{ trans('user.name') }}" class="form-control" name="name" value="{{ old('name') }}" required>
    
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    
                            <input id="email" type="email" placeholder="{{ trans('user.email') }}" class="form-control" name="email" value="{{ old('email') }}" required>
    
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
    
                        </div>
                        <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('user.email') }}</label>
    
                            <div class="col-md-6">
                                <select name="" class="form-control" id="">
                                    <option value="">Laki-Laki</option>
                                    <option value="">Perempuan</option>
                                </select>
    
                                @if ($errors->has('gender_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                            <select class="form-control" name="gender_id" id="">
                                <option>Jenis Kelamin</option>
                                <option value="1">{{ trans('app.male') }}</option>
                                <option value="2">{{ trans('app.female') }}</option>
                            </select>
                            <!-- <label for="gender_id" class="col-md-4 control-label">{{ trans('user.gender') }}</label> -->
    
                            <!-- {!! FormField::radios('gender_id', [1 => trans('app.male'), 2 => trans('app.female')], ['label' => false]) !!} -->
                            
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
    
                            <input id="password-confirm" type="password" placeholder="{{ trans('auth.password_confirmation') }}" class="form-control" name="password_confirmation" required>
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" style="width:100%">
                                {{ __('app.signup') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-8" style="padding:0">
            <div class="auth-bg" style="background: url('images/bg.jpg') no-repeat;height: 100vh;background-size: cover;">
            </div>
        </div>
    </div>
</div>
@endsection
