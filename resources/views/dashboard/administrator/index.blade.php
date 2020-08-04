<?php $title =' Super Admin' ?>
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
				<a class="nav-link active" href="{{route('userAdmin.index')}}" data-toggle="false">
					<i class="fe fe-user mr-1"></i>
					Super Admin
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="javascript: void(0);" data-toggle="false">
					<i class="fe fe-users mr-1"></i>
					List of Super Admin
				</a>
			</li>

		</ul>
    </div>
	<div class="air__layout__content">
		<div class="air__utils__content">
			<h6 class="mb-4">
				<strong>Please fill The below form to create a new super administrator</strong>
			</h6>
			<div class="card">

				<div class="card-body">

                    @include('layouts.alert')

                    <form action="{{ route('userAdmin.save') }}" id="form-validation" name="form-validation" method="POST" class="pt-3 width-710 mx-auto">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-firstname">First Name</label>
                                <input
                                id="validation-first_name"
                                class="form-control"
                                name="first_name"
                                type="text"
                                placeholder="Enter First name"
                                value="{{ old('first_name') }}"
                                data-validation="[L>=2]" data-validation-message="$ must be greater than 2 characters. No special characters allowed."
                                data-validation-regex="/^((?!first_name).)*$/i" data-validation-regex-message='The word "firstname" is not allowed in the $'
                                />
                                @if ($errors->has('first_name'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('first_name') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-last_name">Last name</label>
                                <input
                                id="validation-last_name"
                                class="form-control"
                                name="last_name"
                                type="text"
                                value="{{ old('last_name') }}"
                                placeholder="Enter Last name"
                                data-validation="[L>=3]"
                                data-validation-message="$ must be greater than 3 characters. No special characters allowed."

                                />
                                @if ($errors->has('last_name'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('last_name') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-phone_number">Phone Number</label>
                                <input
                                id="validation-phone_number"
                                class="form-control"
                                name="phone_number"
                                type="number"
                                placeholder="Enter Phone number"
                                value="{{ old('phone_number') }}"
                                data-validation="[L>=11, L<=12, MIXED]"
                                data-validation-message="$ must be 11 digits. No string is allowed."

                                />
                                @if ($errors->has('phone_number'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('phone_number') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-email">Email</label>
                                <input
                                id="validation-email"
                                class="form-control"
                                name="email"
                                type="email"
                                placeholder="Enter The email"
                                value="{{ old('email') }}"
                                data-validation="[EMAIL]"
                                />
                                @if ($errors->has('email'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-password">Password</label>
                                <input
                                id="validation-password"
                                class="form-control"
                                name="password"
                                type="password"
                                data-validation="[L>=6]"
                                data-validation-message="$ must be at least 6 characters"
                                />
                                @if ($errors->has('password'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                <label class="form-label" for="validation-password_confirmation">Confirm Password</label>
                                <input
                                id="validation-password_confirmation"
                                class="form-control"
                                name="password_confirmation"
                                type="password"
                                data-validation="[V==validation[password]]"
                                data-validation-message="$ does not match the password"
                                />
                                @if ($errors->has('password_confirmation'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                            </div>

                        </div>

                        <div class="form-actions" align="right">
                            <button type="submit" class="btn btn-primary mr-2 px-5">Create new Super Admin</button>

                        </div>
                    </form>

				</div>
            </div>
            @if(count($user) > 0)
                <div class="card" >
                    <div class="card-body" style="backgroud-color:gray">

                        <h6 class="mb-4">
                            <strong>List of Added Super Admin</strong>
                        </h6>

                        <table class="table table-hover table-bordered nowrap" id="example1">
                            <small>
                                <thead class="thead-default">
                                    <tr>
                                        <th> S/N </th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th> Phone Number</th>
                                        <th> Status</th>
                                    </tr>
                                </thead><small>
                                <tbody>
                                    <?php $number =1; ?>
                                    @foreach($user as $users)
                                        <tr><small>
                                            <td> {{ $number}}

                                                <a href="{{ route('userAdmin.edit',$users->email)}}">
                                                    <i class="fe fe-edit mr-1" aria-hidden="true" style="color:blue"></i>
                                                </a>
                                                @if(Auth::user()->hasRole('Super Admin'))
                                                    <a href="{{ route('user.delete',$users->email)}}">
                                                        <i class="fe fe-trash mr-1" aria-hidden="true" style="color:red"></i>
                                                    </a>
                                                    @if($users->status == 0)
                                                        <a href="{{ route('user.unsuspend',$users->email)}}">
                                                            <i class="icmn-unlocked" aria-hidden="true" style="color:red"></i>
                                                        </a>
                                                    @else

                                                        <a href="{{ route('user.suspend',$users->email)}}">
                                                            <i class="icmn-lock" aria-hidden="true" style="color:green"></i>
                                                        </a>
                                                    @endif
                                                @endif

                                            </td>
                                            <td>{{ $users->first_name . ' '  . $users->last_name}}</td>
                                            <td>{{ $users->email}}</td>
                                            <td>{{ $users->phone_number}}</td>
                                            <td><b>
                                                @if($users->status == 0)
                                                    <p style="color: red"> Suspended </p>
                                                @else
                                                    <p style="color: green"> Active </p>
                                                @endif
                                                </b>
                                            </td></small>

                                        </tr><?php $number++ ; ?>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> S/N </th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th> Phone Number</th>
                                        <th> Status</th>
                                    </tr>
                                </tfoot>
                            </small>
                        </table>

                    </div>
                </div>
            @endif
        </div>
    </div>


	<script>
        ;(function($) {
          'use strict'
          $(function() {
            $('.dropify').dropify()

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

            $('#slider-1').ionRangeSlider({
              min: 0,
              max: 100,
              from: 50,
              step: 10,
              grid: true,
              grid_num: 10,
            })
          })
          $('#example1').DataTable({
            lengthMenu: [[10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 200, -1], [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 200, 'All']],
            responsive: true,
            autoWidth: true,
          })

        })(jQuery)
	</script>


    @endsection
