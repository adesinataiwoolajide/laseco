<?php $title ='Home Applicances' ?>
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
				<a class="nav-link" href="{{route('appliances.index')}}" data-toggle="false">
					<i class="fe fe-file mr-1"></i>
					Appliances
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="javascript: void(0);" data-toggle="false">
					<i class="fe fe-users mr-1"></i>
					Appliances Analysis
				</a>
			</li>

		</ul>
    </div>
    <div class="air__layout__content">
        <div class="air__utils__content">
            @include('layouts.alert')
            <div class="row" >

                <div class="col-xl-3 col-lg-12">
                    <a href="{{ route('bed.index') }}" style="color:white">
                        <div class="card text-white bg-success">
                            <div class="card-body">

                                <div class="d-flex mb-1">
                                    <div class="text-uppercase font-weight-bold mr-auto">
                                        Total
                                    </div>
                                    <div>
                                        Bed
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="font-size-24 font-weight-bold mr-auto">Household</div>
                                    <div class="font-size-24">{{ $bed ?? 0 }}</div>
                                </div>


                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <a href="{{ route('mat.index') }}" style="color:white">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="d-flex mb-1">
                                    <div class="text-uppercase font-weight-bold mr-auto">
                                        Total
                                    </div>
                                    <div>
                                        Mattrasses
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="font-size-24 font-weight-bold mr-auto">Household</div>
                                    <div class="font-size-24">{{ $mat ??  0 }}</div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <a href="{{ route('table.index') }}" style="color:white">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex mb-1">
                                    <div class="text-uppercase font-weight-bold mr-auto">
                                        Total
                                    </div>
                                    <div>
                                        Furniture
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="font-size-24 font-weight-bold mr-auto">Tables</div>
                                    <div class="font-size-24">{{ $table ??  0 }}</div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <a href="{{ route('sofa.index') }}" style="color:white">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="d-flex mb-1">
                                <div class="text-uppercase font-weight-bold mr-auto">
                                    Total
                                </div>
                                <div>
                                    Furniture
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <div class="font-size-24 font-weight-bold mr-auto">Sofa</div>
                                <div class="font-size-24">{{  $sofa ?? 0 }}</div>
                            </div>

                        </div>
                    </div></a>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('computer.index') }}">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="mr-auto">
                                        <p class="text-uppercase text-dark font-weight-bold mb-1">
                                            Computers
                                        </p>
                                        <p class="text-gray-5 mb-0">
                                            Numbers of People
                                        </p>
                                    </div>
                                    <p class="text-success font-weight-bold font-size-24 mb-0">
                                    {{ $computer }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('radio.index') }}" style="color:white">
                                <div class="text-dark font-size-18 font-weight-bold mb-1">Radio Analysis</div>
                                <div class="text-gray-6 mb-2">Revenue by location and date</div>
                                <div class="air__c9__chartContainer d-flex flex-wrap align-items-center">
                                    <div class="mr-3 mt-3 mb-3 position-relative">
                                        <canvas class="air__c9__chart" width="140" height="140"></canvas>
                                        <div class="air__c9__chartTooltip text-gray-5 font-size-28" id="chart9-tooltip"></div>
                                    </div>
                                </div>
                            </a>

                            <script>

                                ;(function($) {
                                'use strict'
                                $(function() {
                                    /////////////////////////////////////////////////////////////////////////////////////////
                                    const chart9 = new Chart(document.getElementsByClassName('air__c9__chart'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Has Radio', 'No Radio', 'Total'],
                                        datasets: [
                                            {
                                            data: [{{ $haveRadio }}, {{ $noRadio }}, {{ $haveRadio + $noRadio }}],
                                            backgroundColor: ['#32d5d6', '#947002', '#640fc1'],
                                            borderColor: '#fff',
                                            borderWidth: 2,
                                            hoverBorderWidth: 0,
                                            borderAlign: 'inner',
                                            },
                                        ],
                                    },
                                    options: {
                                        animation: false,
                                        responsive: true,
                                        cutoutPercentage: 70,
                                        legend: {
                                        display: false,
                                        },
                                        legendCallback: function(chart) {
                                        let text = []
                                        text.push('<div class="air__c9__chartLegend flex-shrink-0">')
                                        for (let i = 0; i < chart.data.labels.length; i++) {
                                            const label = chart.data.labels[i]
                                            const tabletBg = chart.data.datasets[0].backgroundColor[i]
                                            text.push(
                                            '<div class="d-flex align-items-center flex-nowrap mt-2 mb-2"><div class="air__utils__tablet mr-3" style="background-color:' +
                                                tabletBg +
                                                '"></div>' +
                                                label +
                                                '</div>',
                                            )
                                        }
                                        text.push('</div>')
                                        text = $(text.join(''))
                                        return text
                                        },
                                        tooltips: {
                                        enabled: false,
                                        custom: function(tooltip) {
                                            const tooltipEl = document.getElementById('chart9-tooltip')

                                            // Hide if no tooltip
                                            if (tooltip.opacity === 0) {
                                            tooltipEl.style.opacity = 0
                                            return
                                            }

                                            if (tooltip.body) {
                                            const value = this._data.datasets[tooltip.dataPoints[0].datasetIndex].data[
                                                tooltip.dataPoints[0].index
                                            ].toLocaleString()
                                            tooltipEl.innerHTML = value
                                            }

                                            tooltipEl.style.opacity = 1
                                            tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px'
                                        },
                                        },
                                    },
                                    })
                                    const chart9Legend = chart9.generateLegend()
                                    $('.air__c9__chartContainer').append(chart9Legend[0])
                                    /////////////////////////////////////////////////////////////////////////////////////////
                                })
                                })(jQuery)
                            </script>
                        </div>
                    </div>
                    <div class="card">

                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('generator.index') }}">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="mr-auto">
                                        <p class="text-uppercase text-dark font-weight-bold mb-1">
                                        Generators
                                        </p>
                                        <p class="text-gray-5 mb-0">
                                        Numbers of People
                                        </p>
                                    </div>
                                    <p class="text-danger font-weight-bold font-size-24 mb-0">
                                        {{$generator}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="card card-borderless">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-unstyled air__l18__list">
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('fan.index') }}" >
                                            <div class="text-uppercase mb-1">Fan</div>
                                            <div>
                                                <div class="text-nowrap d-inline-block">
                                                <div class="air__utils__donut air__utils__donut--success"></div>
                                                <span class="font-weight-bold text-gray-6">{{ $fan }}</span>
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('ac.index') }}" >
                                        <div class="text-uppercase mb-1">Air Condition</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--danger"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $ac }}</span>
                                            </div>

                                        </div>
                                        </a>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('iron.elec') }}" >
                                            <div class="text-uppercase mb-1">Electric Iron</div>
                                            <div>
                                                <div class="text-nowrap d-inline-block">
                                                <div class="air__utils__donut air__utils__donut--success"></div>
                                                <span class="font-weight-bold text-gray-6">{{ $eIron }}</span>
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('iron.coal') }}" >
                                            <div class="text-uppercase mb-1">Charcoal Iron</div>
                                            <div>
                                                <div class="text-nowrap d-inline-block">
                                                <div class="air__utils__donut air__utils__donut--orange"></div>
                                                <span class="font-weight-bold text-gray-6">{{ $cIron }}</span>
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('refrigerator.index') }}" >
                                            <div class="text-uppercase mb-1">Refrigerator</div>
                                            <div>
                                                <div class="text-nowrap d-inline-block">
                                                <div class="air__utils__donut air__utils__donut--danger"></div>
                                                <span class="font-weight-bold text-gray-6">{{ $refrigerator }}</span>
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <a href="{{ route('frezer.index') }}" >
                                            <div class="text-uppercase mb-1">Freezer</div>
                                            <div>
                                                <div class="text-nowrap d-inline-block">
                                                <div class="air__utils__donut air__utils__donut--primary"></div>
                                                <span class="font-weight-bold text-gray-6">{{ $freezer }}</span>
                                                </div>

                                            </div>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">

                    </div>


                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('washing.index') }}">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="mr-auto">
                                    <p class="text-uppercase text-dark font-weight-bold mb-1">
                                        Washing Machine
                                    </p>
                                    <p class="text-gray-5 mb-0">
                                        Numbers of People
                                    </p>
                                    </div>
                                    <p class="text-primary font-weight-bold font-size-24 mb-0">
                                    {{ $washing }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-dark font-size-18 font-weight-bold mb-1">Television Analysis</div>
                            <div class="text-gray-6 mb-2">Chart showing television</div>
                            <div class="air__c10__chartContainer d-flex flex-wrap align-items-center">
                                <div class="mr-3 mt-3 mb-3 position-relative">
                                <canvas class="air__c10__chart" width="140" height="140"></canvas>
                                <div class="air__c10__chartTooltip text-center" id="chart10-tooltip">
                                    <div class="air__c10__tooltipLabel font-size-14 font-weight-bold text-dark"></div>
                                    <div class="air__c10__tooltipValue font-size-14 text-dark"></div>
                                </div>
                                </div>
                            </div>

                            <script>

                                ;(function($) {
                                'use strict'
                                $(function() {
                                    /////////////////////////////////////////////////////////////////////////////////////////
                                    const chart10 = new Chart(document.getElementsByClassName('air__c10__chart'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Yes', 'No', 'All'],
                                        datasets: [
                                        {
                                            data: [{{ $haveTele }}, {{ $noTele }}, {{ $haveTele + $noTele }}],
                                            backgroundColor: ['#4a543f', '#fb434a', '#1b55e3'],
                                            borderColor: '#fff',
                                            borderWidth: 2,
                                            hoverBorderWidth: 0,
                                            borderAlign: 'inner',
                                        },
                                        ],
                                    },
                                    options: {
                                        animation: false,
                                        responsive: true,
                                        cutoutPercentage: 70,
                                        legend: {
                                        display: false,
                                        },
                                        legendCallback: function(chart) {
                                        let text = []
                                        text.push('<div class="air__c10__chartLegend flex-shrink-0">')
                                        for (let i = 0; i < chart.data.labels.length; i++) {
                                            const label = chart.data.labels[i]
                                            const tabletBg = chart.data.datasets[0].backgroundColor[i]
                                            text.push(
                                            '<div class="d-flex align-items-center flex-nowrap mt-2 mb-2"><div class="air__utils__tablet mr-3" style="background-color:' +
                                                tabletBg +
                                                '"></div>' +
                                                label +
                                                '</div>',
                                            )
                                        }
                                        text.push('</div>')
                                        text = $(text.join(''))
                                        return text
                                        },
                                        tooltips: {
                                        enabled: false,
                                        custom: function(tooltip) {
                                            const tooltipEl = document.getElementById('chart10-tooltip')
                                            // Hide if no tooltip
                                            if (tooltip.opacity === 0) {
                                            tooltipEl.style.opacity = 0
                                            return
                                            }

                                            if (tooltip.body) {
                                            const label = tooltip.body[0].lines[0].split(':')[0]
                                            const value = this._data.datasets[tooltip.dataPoints[0].datasetIndex].data[
                                                tooltip.dataPoints[0].index
                                            ].toLocaleString()
                                            tooltipEl.querySelector('.air__c10__tooltipLabel').innerHTML = label
                                            tooltipEl.querySelector('.air__c10__tooltipValue').innerHTML = value
                                            }

                                            tooltipEl.style.opacity = 1
                                            tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px'
                                        },
                                        },
                                    },
                                    })
                                    const chart10Legend = chart10.generateLegend()
                                    $('.air__c10__chartContainer').append(chart10Legend[0])
                                    /////////////////////////////////////////////////////////////////////////////////////////
                                })
                                })(jQuery)
                            </script>
                        </div>
                    </div>
                    <div class="card">

                    </div>
                </div>


            </div>
        </div>


    @endsection
