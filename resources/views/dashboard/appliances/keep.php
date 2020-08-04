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
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
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
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-dark font-size-18 font-weight-bold mb-1">Radio Analysis</div>
                            <div class="text-gray-6 mb-2">Revenue by location and date</div>
                            <div class="air__c9__chartContainer d-flex flex-wrap align-items-center">
                                <div class="mr-3 mt-3 mb-3 position-relative">
                                <canvas class="air__c9__chart" width="140" height="140"></canvas>
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
                                        labels: ['Has Radio', 'No Radio', 'Total'],
                                        datasets: [
                                            {
                                            data: [{{ $haveRadio }}, {{ $noRadio }}, {{ $haveRadio + $noRadio }}],
                                            backgroundColor: ['#46be8a', '#fb434a', '#1b55e3'],
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
                            <div class="mb-3">
                                <div class="bg-gray-1 text-gray-6 text-uppercase px-3 py-1 mb-2">
                                Today - 7 may 2019
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless text-gray-6 mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Bed</td>
                                            <td class="text-right"><strong>+78,366,263.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Mattress</td>
                                            <td class="text-right"><strong>+58,165,000.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Furniture Sofa</td>
                                            <td class="text-right"><strong>+26,156,267.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Furniture Table</td>
                                            <td class="text-right"><strong>+18,823,026.00$</strong></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
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
                                            backgroundColor: ['#46be8a', '#fb434a', '#1b55e3'],
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
                            <div class="mb-3">
                                <div class="bg-gray-1 text-gray-6 text-uppercase px-3 py-1 mb-2">
                                Today - 7 may 2019
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless text-gray-6 mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Bed</td>
                                            <td class="text-right"><strong>+78,366,263.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Mattress</td>
                                            <td class="text-right"><strong>+58,165,000.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Furniture Sofa</td>
                                            <td class="text-right"><strong>+26,156,267.00$</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Furniture Table</td>
                                            <td class="text-right"><strong>+18,823,026.00$</strong></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="mr-auto">
                                <p class="text-uppercase text-dark font-weight-bold mb-1">
                                Refunds
                                </p>
                                <p class="text-gray-5 mb-0">
                                Averache Weekly Reunds
                                </p>
                            </div>
                            <p class="text-danger font-weight-bold font-size-24 mb-0">
                                -$8,474
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-borderless">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled air__l18__list">
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Fan</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--success"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $fan }}</span>
                                        </div>

                                    </div>
                                </li>
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Air Condition</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--danger"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $ac }}</span>
                                        </div>

                                    </div>
                                </li>
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Electric Iron</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--success"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $eIron }}</span>
                                        </div>

                                    </div>
                                </li>
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Charcoal Iron</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--orange"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $cIron }}</span>
                                        </div>

                                    </div>
                                </li>
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Refrigeratord</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--danger"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $refrigerator }}</span>
                                        </div>

                                    </div>
                                </li>
                                <li class="air__l18__item text-muted">
                                    <div class="text-uppercase mb-1">Freezer</div>
                                    <div>
                                        <div class="text-nowrap d-inline-block">
                                        <div class="air__utils__donut air__utils__donut--primary"></div>
                                        <span class="font-weight-bold text-gray-6">{{ $freezer }}</span>
                                        </div>

                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>


    @endsection
