<?php $title =' Upload Files' ?>
@extends('layouts.app')
    @section('content')

    <div class="col-lg-12 mb12">

		<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-bold" style="color:blue">
			<li class="nav-item">
				<a class="nav-link" href="{{route('administrator.dashboard')}}" data-toggle="false">
					<i class="fe fe-home mr-1"></i>
					Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('upload.index')}}" data-toggle="false">
					<i class="fe fe-file mr-1"></i>
					Upload File
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="javascript: void(0);" data-toggle="false">
					<i class="fe fe-users mr-1"></i>
					Upload new file
				</a>
			</li>

		</ul>
    </div>
	<div class="air__layout__content">
		<div class="air__utils__content">
			<h6 class="mb-4">
				<strong>Please select the (XML) file or Excel (.csv) file</strong>
			</h6>
			<div class="card">

				<div class="card-body">
                    @include('layouts.alert')
                    <form action="{{ route('upload.save') }}" id="form-validation" enctype="multipart/form-data" name="form-validation" method="POST" class="pt-3 width-710 mx-auto">
                        {{ csrf_field() }}
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="form-label" for="validation-firstname">Select File</label>
								<input class="form-control" name="file" type="file" multiple value="{{ old('file') }}" required
                                />
                                @if ($errors->has('file'))
                                    <small class="form-control-feedback" style="color:red">
                                        {{ $errors->first('file') }}
                                    </small>
                                @endif
							</div>

						</div>

						<div class="form-actions" align="right">
							<button type="submit" class="btn btn-success mr-2 px-5">Upload File (s)</button>
						</div>
					</form>
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
            $('#example1').DataTable({
                responsive: true,
              })

              $('#example2').DataTable({
                autoWidth: true,
                scrollX: true,
                fixedColumns: true,
              })

              $('#example3').DataTable({
                autoWidth: true,
                scrollX: true,
                fixedColumns: true,
              })
          })
        })(jQuery)
	</script>


    @endsection
