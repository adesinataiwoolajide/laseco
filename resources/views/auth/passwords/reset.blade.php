<?php $title = " Reset Password"; ?>
@extends('layouts.login')

@section('content')
<div class="air__auth" style="margin-top:30px">
    <div class="pt-4 pb-4 d-flex align-items-end mt-auto">
        <img src="{{asset('design/components/core/img/IGR logo.png')}}" style="width:200px; height:110px" alt="IGR Logo" />

    </div>
    <div class="air__auth__container pl-5 pr-5 pt-5 pb-5 bg-white text-center" align="center">
        <div class="text-dark font-size-30 mb-4">Reset your password</div>
        <form action="{{ route('password.update') }}" class="mb-4" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" readonly autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <input id="password-confirm" type="password"  placeholder="Comfirm your password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            
            <button class="text-center btn btn-success w-100 font-weight-bold font-size-18">
                Update Password
            </button>
        </form>
        
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue font-weight-bold font-size-18">Forgot password?</a>
        @endif
        
    </div>
    <div class="text-center font-size-18 pt-4 mb-auto">
        Already have an account?
        <a href="{{ route('admin.logout') }}" class="font-weight-bold text-blue text-underlined"><u>Sign in</u></a>
    </div>
</div>
@endsection
