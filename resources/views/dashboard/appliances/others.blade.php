<?php $title ='Other Assets' ?>
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
				<a class="nav-link" href="{{route('appliances.other')}}" data-toggle="false">
					<i class="fe fe-list mr-1"></i>
					Others
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
            <div class="row">
                @include('layouts.alert')
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-dark font-size-18 font-weight-bold mb-1">Vehicle Analysis</div>
                            <div class="text-gray-6 mb-2">Numbers of people</div>
                            <div class="air__c9__chartContainer d-flex flex-wrap align-items-center">
                                <div class="mr-3 mt-3 mb-3 position-relative">
                                    <canvas class="air__c9__chart" width="110" height="140"></canvas>
                                    <div class="air__c9__chartTooltip text-gray-5 font-size-28" id="chart9-tooltip"></div>
                                </div>
                            </div>

                            <script>

                                ;(function($) {
                                'use strict'
                                $(function() {
                                    /////////////////////////////////////////////////////////////////////////////////////////
                                    const chart9 = new Chart(document.getElementsByClassName('air__c9__chart'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Car ({{ $car ?? 0 }})', 'Boat ({{ $boat ?? 0 }})', 'Canoe ({{ $canoe ?? 0 }})', 'Bicycle ({{ $bicycle ?? 0 }})', 'Motorcycle ({{ $motorcycle ?? 0 }})'],
                                        datasets: [
                                            {
                                            data: [{{ $car ?? 0 }}, {{ $boat ?? 0 }}, {{ $canoe ?? 0 }}, {{ $bicycle ?? 0 }}, {{ $motorcycle ?? 0 }}],
                                            backgroundColor: ['#FF6633', '#FFB399', '#FF33FF', '#6680B3', '#00B3E6', ],
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
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="mr-auto">
                                    <p class="text-uppercase text-dark font-weight-bold mb-1">
                                        Touchlight
                                    </p>
                                    <p class="text-gray-5 mb-0">
                                        Numbers of People
                                    </p>
                                </div>
                                <p class="text-success font-weight-bold font-size-24 mb-0">
                                {{ $touchlight ?? 0 }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">

                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card card-borderless">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-unstyled air__l18__list">
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">House Current</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--success"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $housecurrent ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">House Elsewhere</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--danger"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $houseelsewhere ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">Land for housing</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--success"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $landforhousing ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">Farmland</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--orange"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $farmland ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">Land Phone</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--danger"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $landphone ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="air__l18__item text-muted">
                                        <div class="text-uppercase mb-1">Mobile Phone</div>
                                        <div>
                                            <div class="text-nowrap d-inline-block">
                                            <div class="air__utils__donut air__utils__donut--primary"></div>
                                            <span class="font-weight-bold text-gray-6">{{ $mobilephone ?? 0 }}</span>
                                            </div>

                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="mr-auto">
                                    <p class="text-uppercase text-dark font-weight-bold mb-1">
                                    Kerosene Stove
                                    </p>
                                    <p class="text-gray-5 mb-0">
                                    Numbers of People
                                    </p>
                                </div>
                                <p class="text-danger font-weight-bold font-size-24 mb-0">
                                    {{$kerosene ?? 0}}
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="card">

                    </div>


                </div>
                <div class="col-xl-4 col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="text-dark font-size-18 font-weight-bold mb-1">Pets Analysis</div>
                            <div class="text-gray-6 mb-2">Chart showing pet</div>
                            <div class="air__c10__chartContainer d-flex flex-wrap align-items-center">
                                <div class="mr-3 mt-3 mb-3 position-relative">
                                <canvas class="air__c10__chart" width="120" height="140"></canvas>
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
                                        labels: ['Cattle ({{ $cattle ?? 0 }})', 'Goat ({{ $goat ?? 0 }})', 'Bird ({{ $bird ?? 0 }})'],
                                        datasets: [
                                        {
                                            data: [{{ $cattle ?? 0 }}, {{ $goat ?? 0 }}, {{ $bird }}],
                                            backgroundColor: [ '#c79ed2', '#d02e29', '#4D8066'],
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
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="mr-auto">
                                <p class="text-uppercase text-dark font-weight-bold mb-1">
                                    Video DVD
                                </p>
                                <p class="text-gray-5 mb-0">
                                    Numbers of People
                                </p>
                                </div>
                                <p class="text-primary font-weight-bold font-size-24 mb-0">
                                {{ $dvd ?? 0 }}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="card">

                    </div>
                </div>


            </div>
        </div>


    @endsection
