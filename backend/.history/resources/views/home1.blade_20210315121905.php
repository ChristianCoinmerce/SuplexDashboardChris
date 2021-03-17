@extends('layouts.dashboard')

@section('content')
<div class="container-fluid" style="margin-left: 0px;">
    <div class="row">

        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Payouts Ethermine</div>
                <div class="card-body" style="height: 450px; overflow-y: scroll;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach($workers as $worker)
                    <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                        <div style="margin: 10px">
                            <p>Payout ETH: {{ substr(payout_eth($worker["amount"]), 0,8) }}</p>
                            <p>Payout EUR:
                                €{{ substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2), 0,6) }}
                            </p>
                            <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Ethermine</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">{{ substr($infos['reportedHashrate'], 0,3) }} <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Local</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ substr($infos['currentHashrate'], 0,3) }} <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Pool</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ substr($infos['averageHashrate'], 0,3) }} <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Average</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">{{ $infos['validShares'] }}</div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $infos['invalidShares'] }}</div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $infos['staleShares'] }}</div>
                        <div class="text-uppercase text-muted small">Stale Shares</div>
                    </div>
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Earnings Ethermine
                </div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        <div class="text-value-xl">€{{ str_replace(".", "",substr($infos['unpaid']*$price_eur*100, 0,4)) }}</div>
                        <div class="text-uppercase text-muted small">Unpaid</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0,{{ substr($infos['unpaid'], 0,3) }}</div>
                        <div class="text-uppercase text-muted small">Unpaid Eth</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">€{{ str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur, 0,5)) }}</div>
                        <div class="text-uppercase text-muted small">Average daily</div>
                    </div>
                </div>
                <div class="card-footer">Since last payout:
                    @foreach($workers as $key => $worker)
                    @if ($key == 0)
                    {{ time_diff($worker["paidOn"]) }}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
{{---------------------------------------------------------------------}}


        <div class="col-12 col-xl-3">

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Average Earnings Minerstat</div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_day']/$price_usd, 0,5)) }}</div>
                        <div class="text-uppercase text-muted small">Daily</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_week']/$price_usd, 0,6)) }}</div>
                        <div class="text-uppercase text-muted small">Weekly</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_month']/$price_usd, 0,6)) }}</div>
                        <div class="text-uppercase text-muted small">Monthly</div>
                    </div>
                </div>
                <div class="card-footer">Current Ether price:
                    €{{ floor($msinfos['cprice']/$price_usd *100)/100 }}
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Minerstat</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl" style="font-size: 22px">{{ strtoupper($msinfos['status']) }}</div>
                        <div class="text-uppercase text-muted small">Uptime</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $msinfos['consumption'] }}W</div>
                        <div class="text-uppercase text-muted small">Consumption</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $msinfos['devices'] }} </div>
                        <div class="text-uppercase text-muted small">Devices</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">@foreach($msinfos['shares'] as $share) {{ $share['accepted_shares']}} @endforeach</div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $infos['invalidShares'] }}</div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ $infos['staleShares'] }}</div>
                        <div class="text-uppercase text-muted small">Stale Shares</div>
                    </div>
                </div>
                <div style="card-footer">
                </div>
            </div>

        </div>


        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Minerstat Data</div>
                <div class="card-body" style="height: 450px; overflow-y: scroll;">
                    <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                        <div style="margin: 10px">
                            <p>Payout ETH: </p>
                            <p>Payout EUR:
                                {{-- €{{ substr(number_format(str_replace(".", "",$msinfo['amount']*$price_eur*100), 2), 0,6) }} --}}
                            </p>
                            {{-- <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{-----------------------------------------------------------}}


    @foreach($minerstat as $key => $ms)
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-<?php
                    if ($ms['temp'] < 40) {
                        echo 'success';
                    }
                    elseif($ms['temp'] < 55){
                        echo 'warning';
                    }
                    else {
                        echo 'danger';
                    }

                ?>">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg" >#{{ ($key+1)."&nbsp;".$ms['name'] }}</div>
                        <div>Temperature: <b>{{$ms['temp']}}°C </b></div>
                        <div>Fan Speed: <b>{{$ms['fan']}}% </b></div>
                        <div>Power Usage: <b>{{$ms['power']}}W</b></div>
                        <div>Hashrate: <b>{{ substr($ms['speed'],0,5) }}</b></div>
                        <div>Accepted Shares: <b>{{$ms['accepted']}}</b></div>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg class="c-icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                        style="display: block; width: 258px; height: 70px;" width="258"></canvas>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
