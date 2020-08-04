<?php $title = " Forgot Password"; ?>
@extends('layouts.login')

@section('content')
<div class="air__initialLoading"></div>

<div class="air__auth">
    <div class="pt-4 pb-4 d-flex align-items-end mt-auto">
        <img src="{{asset('design/components/core/img/IGR logo.png')}}" style="width:200px; height:110px" alt="IGR Logo" />

    </div>
    <div class="air__auth__container pl-5 pr-5 pt-5 pb-5 bg-white text-center" align="center">

        <div class="text-dark font-size-30 mb-4">Reset Password</div>
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
        @endif
        <form action="{{ route('password.email') }}" class="mb-3" method="POST">
            {{ csrf_field() }}

            <div class="form-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter The E-Mail" value="{{ old('email') }}" />
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <button class="text-center btn btn-success w-100 font-weight-bold font-size-18">
                Reset my password
            </button>
        </form>
        {{--  @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue font-weight-bold font-size-18">Forgot password?</a>
        @endif  --}}

    </div>
    <div class="text-center font-size-18 pt-3 mb-auto">
        Already have an account?
        <a href="/" class="font-weight-bold text-blue text-underlined"><u>Sign in</u></a>
    </div>

</div>
@endsection
