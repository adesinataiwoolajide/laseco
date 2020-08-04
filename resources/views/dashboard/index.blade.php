<?php $title =' Dashboard' ?>
@extends('layouts.app')
@section('content')
<div class="col-lg-12 mb12">
    @if(( Auth::user()->email_verified_at) == "")


        <div class="air__layout__content">
            <div class="air__utils__content">
                <div class="col-lg-12">

                    <div class="mb-5">
                        <div class="mb-5">
                            <div style="width: 100%; background: #f2f4f8; padding: 10px 20px; color: #514d6a;">
                                <div style="max-width: 700px; margin: 0px auto; font-size: 14px">
                                    <table style="border-collapse: collapse; border: 0; width: 100%; margin-bottom: 20px">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <img
                                                    src="{{ asset('design/components/core/img/favicon.png')}}"
                                                    alt="IGR Team"
                                                    style="height: 40px"
                                                />
                                            </td>
                                            <td style="text-align: right; vertical-align: middle;">
                                                <span style="color: #a09bb9;">
                                                    LASECO
                                                </span>
                                            </td>
                                        </tr>
                                    </table>

                                    <div style="padding: 40px 40px 20px 40px; background: #fff;">
                                        <table style="border-collapse: collapse; border: 0; width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 style="margin-bottom: 20px; color: #24222f; font-weight: 600">
                                                        Account Activation
                                                        </h5>
                                                        <h6> <b> Dear {{Auth::user()->first_name . " ". Auth::user()->last_name}} </b></h6> <br>
                                                        <p>
                                                            @if (session('resent'))
                                                              <p style="color:green"> A fresh verification link has been sent to  {{ Auth::user()->email}}. </p>
                                                            @endif
                                                            Before proceeding, please check your email for a verification link.
                                                        </p>

                                                        <p> If you did not receive the email, please click the button below to request a fresh activation link </p>
                                                        <div style="text-align: center">
                                                            <a
                                                                href="{{ route('verification.resend') }}"
                                                                style="display: inline-block; padding: 11px 30px 6px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px"
                                                            >
                                                                Activate Your Account
                                                            </a>
                                                        </div>
                                                        {{--  <p>If you did not forgot your password you can safely ignore his email.</p>  --}}
                                                        <p>Regards,<br />Jethro Software Ltd</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="text-align: center; font-size: 12px; color: #a09bb9; margin-top: 20px">
                                        <p>
                                        Jethro Software Ltd., 21 Ladoke Akintola Avenue, New Bodija, Ibadan, Nigeria

                                        <br />
                                        Powered by Jethro Systems Limited
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="air__subbar">
            <ul class="air__subbar__breadcrumbs mr-4">
                <li class="air__subbar__breadcrumb">
                    <a href="{{route('administrator.dashboard')}}" class="air__subbar__breadcrumbLink">LASOCU </a>
                </li>
                <li class="air__subbar__breadcrumb">
                    <a href="{{ route('administrator.dashboard') }}" class="air__subbar__breadcrumbLink air__subbar__breadcrumbLink--current"
                    >DASHBOARD</a
                    >
                </li>
            </ul>
            <div class="air__subbar__divider mr-4 d-none d-xl-block"></div>
            <p class="color-gray-4 text-uppercase font-size-18 mb-0 mr-4 d-none d-xl-block">{{ date('d-M-Y')}}</p>
            <a class="btn btn-primary btn-with-addon mr-auto text-nowrap d-none d-md-block">
                <span class="btn-addon">
                    <i class="btn-addon-icon fe fe-plus-circle"></i>
                </span>
                Upload File
            </a>
            <div class="air__subbar__amount mr-3 ml-auto d-none d-sm-flex">
                <p class="air__subbar__amountText">
                    Today
                    <span class="air__subbar__amountValue">{{ count($dataToday) ?? 0 }}</span>
                </p>
                <div class="air__subbar__amountGraph">
                    <i class="air__subbar__amountGraphItem" style="height: 80%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 50%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 70%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 60%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 50%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 65%"></i>
                </div>
            </div>
            <div class="air__subbar__amount d-none d-sm-flex">
                <p class="air__subbar__amountText">
                    this month
                    <span class="air__subbar__amountValue">{{ count($dataMonth) ?? 0 }}</span>
                </p>
                <div class="air__subbar__amountGraph">
                    <i class="air__subbar__amountGraphItem" style="height: 60%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 65%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 75%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 55%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 100%"></i>
                    <i class="air__subbar__amountGraphItem" style="height: 85%"></i>
                </div>
            </div>

        </div><br>
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                @include('layouts.alert')
            </div>
            @include('layouts.fusioncharts')


            <div class="col-xl-3 col-lg-12">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex mb-1">
                            <div class="text-uppercase font-weight-bold mr-auto">
                                Total
                            </div>
                            <div>
                                Interviewed
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="font-size-24 font-weight-bold mr-auto">Household</div>
                            <div class="font-size-24">{{ number_format(count($houseHold)) ?? 0 }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 60%" role="progressbar" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <div class="d-flex mb-1">
                            <div class="text-uppercase font-weight-bold mr-auto">
                                Total
                            </div>
                            <div>
                                 Enumerators
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="font-size-24 font-weight-bold mr-auto">Numbers of </div>
                            <div class="font-size-24">{{ number_format(count($enumerator)) ?? 0 }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 60%" role="progressbar" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-12">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="d-flex mb-1">
                            <div class="text-uppercase font-weight-bold mr-auto">
                                Total
                            </div>
                            <div>
                               LGA
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="font-size-24 font-weight-bold mr-auto">Numbers of</div>
                            <div class="font-size-24">{{ number_format(count($lga)) ?? 0 }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 60%" role="progressbar" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-lg-12">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex mb-1">
                            <div class="text-uppercase font-weight-bold mr-auto">
                                Total
                            </div>
                            <div>
                                Communities Reached
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="font-size-24 font-weight-bold mr-auto">Numbers of</div>
                            <div class="font-size-24">{{ count($community) ?? 0 }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-dark" style="width: 60%" role="progressbar" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>
            @if (count($data) > 0)
                <div class="col-xl-12 col-lg-12">

                    <div class="card">
                        <div class="card-header card-header-flex">
                            <div class="d-flex flex-column justify-content-center mr-auto">
                                <h5 class="mb-0">Enumerators</h5>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <a class="btn btn-primary" href="javascript: void(0);">Upload New File</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered nowrap" id="example1">
                                <thead class="thead-default">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Cbt Leader</th>
                                        <th>State</th>
                                        {{-- <th>Zone</th> --}}
                                        {{-- <th>LGA</th> --}}
                                        <th>Sim Serial</th>
                                        <th>Subscriber ID</th>
                                        <th>Community</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num =1 ; ?>
                                    @foreach ($data as $item)
                                        <tr>

                                            <td>{{ $num }}</td>
                                            <td>{{ $item->enumerator_name ?? 'N/A' }}</td>
                                            <td>{{ $item->enumerator_code }}</td>
                                            <td>{{ $item->cbt_leader }}</td>
                                            <td>{{ $item->state }}</td>
                                            {{-- <td>{{ $item->zone }}</td> --}}
                                            {{-- <td>{{ $item->lga }}</td> --}}
                                            <td>{{ $item->sim_serial }}</td>
                                            <td>{{ $item->subscriber_id }}</td>
                                            <td>{{ $item->community }}</td>
                                            <td>
                                                <a href="{{ route('enumerator.index', $item->enumerator_code) }}" class="btn btn-sm btn-light mr-2">
                                                    <i class="fe fe-edit mr-2"></i> View
                                                </a>

                                            </td>
                                        </tr><?php $num++; ?>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Cbt Leader</th>
                                        <th>State</th>
                                        {{-- <th>Zone</th> --}}
                                        {{-- <th>LGA</th> --}}
                                        <th>Sim Serial</th>
                                        <th>Subscriber ID</th>
                                        <th>Community</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endif


        </div>

    @endif
</div>
@endsection
