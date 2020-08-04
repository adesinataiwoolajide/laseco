<?php $title ='Furniture Table Owners' ?>
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
				<a class="nav-link" href="{{route('sofa.index')}}" data-toggle="false">
					<i class="fe fe-file mr-1"></i>
					Furniture Table Owners
				</a>
            </li>
            <li class="nav-item">
				<a class="nav-link" href="{{route('appliances.index')}}" data-toggle="false">
					<i class="fe fe-list mr-1"></i>
					Appliances
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="javascript: void(0);" data-toggle="false">
					<i class="fe fe-users mr-1"></i>
					List of Furniture Sofa owners
				</a>
			</li>

		</ul>
    </div>
    <div class="air__layout__content">
        <div class="air__utils__content">
            @include('layouts.alert')
            @if(count($table) > 0)
                <div class="card">

                    <div class="card-body" style="backgroud-color:gray">

                        <h6 class="mb-4">
                            <strong>List of All Furniture Table Owners</strong>
                        </h6>

                        <table class="table table-hover table-bordered nowrap" id="example1">
                            <small>
                                <thead class="thead-default">
                                    <tr>
                                        <th> S/N </th>
                                        <th> enumerator</th>
                                        <th>Full Name</th>
                                        <th>hhno</th>
                                        <th> Contact No</th>
                                        <th> hhaddress</th>

                                        <th> Zone</th>
                                        <th> ward</th>
                                        <th> lga</th>
                                        <th> geopoint</th>
                                    </tr>
                                </thead><small>
                                <tbody>
                                    <?php $number =1; ?>
                                    @foreach($table as $tables)<?php

                                        $houseHold = get_house_hold_infomations($tables->data_id);
                                        $enumerator = get_enumratore($houseHold->enumerator_code)  ?>
                                        <tr><small>
                                            <td> {{ $number}}</td>
                                            <td>{{ $enumerator->enumerator_name  ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->hhh_surname . ' '  . $houseHold->hhh_firstname . ' '. $houseHold->hhh_othername ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->hhno  ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->contact_no ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->hhaddress ?? 'N/A'}}</td>

                                            <td>{{ $houseHold->zone ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->ward ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->lga  ?? 'N/A'}}</td>
                                            <td>{{ $houseHold->geopoint  ?? 'N/A'}}</td>
                                            </small>

                                        </tr><?php $number++ ; ?>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> S/N </th>
                                        <th> enumerator</th>
                                        <th>Full Name</th>
                                        <th>hhno</th>
                                        <th> Contact No</th>
                                        <th> hhaddress</th>

                                        <th> Zone</th>
                                        <th> ward</th>
                                        <th> lga</th>
                                        <th> geopoint</th>
                                    </tr>
                                </tfoot>
                            </small>
                        </table>

                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection
