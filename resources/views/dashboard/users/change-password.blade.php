<?php $title =' Change Password' ?>
@extends('layouts.app')
    @section('content')

    <div class="col-lg-12 mb12">

		<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-bold" style="color:blue">
			<li class="nav-item">
				<a class="nav-link" href="{{route('dashboard.index')}}" data-toggle="false">
					<i class="fe fe-home mr-1"></i>
					Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('user.password',Auth::user()->email) }}" data-toggle="false">
					<i class="icmn-lock"></i>
					Change Password
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="javascript: void(0);" data-toggle="false">
					<i class="fe fe-user mr-1"></i>
					Change your password
				</a>
			</li>

		</ul>
    </div>

    <div class="air__layout__content">
        <div class="air__utils__content">

            <div class="card ">
                <div class="card-body" style="background-color:">
                    @include('layouts.alert')
                    <form action="{{ route('update.password',AUth::user()->email) }}" id="form-validation" name="form-validation" enctype="multipart/form-data" method="POST" class="pt-3 width-800 mx-auto">
                        {{ csrf_field() }}
                        <div class="form-row">


                            <div class="form-group col-md-3"> </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="validation-password">New Password</label>
                                <input id="validation-password" class="form-control"  name="password" type="password" value="{{ old('password') ?? ''}}"
                                data-validation="[L>=6]"
                                data-validation-message="$ must be greater than 6 characters. No special characters allowed."/>
                                @if ($errors->has('password'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group col-md-3"> </div>
                            <div class="form-group col-md-3"> </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="validation-password_confirmation">Confirm New Password</label>
                                <input id="validation-password_confirmation" class="form-control"  name="password_confirmation" type="password" value="{{ old('password_confirmation') ?? ''}}"
                                data-validation="[L>=6]"
                                data-validation-message="$ must be greater than 6 characters. No special characters allowed."/>
                                @if ($errors->has('password_confirmation'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group col-md-3"> </div>
                        </div>
                        <input type="hidden" nam"email" value="{{AUth::user()->email}}">

                        <div class="form-actions" align="center">
                            <button type="submit" class="btn btn-primary mr-2 px-5">Update your password</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        ;(function($) {
          'use strict'
          $('#form-validation').validate({
                submit: {
                    settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger',
                    },
                },
            })

            $('#form-validation .remove-error').on('click', function() {
                $('#form-validation').removeError()
            })
            $('#password').password({
                eyeClass: '',
                eyeOpenClass: 'fe fe-eye',
                eyeCloseClass: 'fe fe-eye-off',
              })


        })(jQuery)
    </script>


    @endsection
