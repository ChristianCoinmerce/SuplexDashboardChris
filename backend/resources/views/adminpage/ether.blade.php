@extends('adminpage.dashboard')
@section('title', __('Mining Dashboard'))
@section('content')

{{-- @if($msinfos['status'] == 'offline') --}}
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
                    @if(isset($workers))
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
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Ethermine</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['reportedHashrate']) ? substr($infos['reportedHashrate'], 0,3) : '0' }}<small> MH/s</small></div>
                        <div class="text-uppercase text-muted small">Local</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['reportedHashrate']) ? substr($infos['currentHashrate'], 0,3) : '0' }}<small> MH/s</small></div>
                        <div class="text-uppercase text-muted small">Pool</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['reportedHashrate']) ? substr($infos['averageHashrate'], 0,3) : '0' }}<small> MH/s</small></div>
                        <div class="text-uppercase text-muted small">Average</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['validShares']) ? $infos['validShares'] : '0' }}</div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['invalidShares']) ? $infos['invalidShares'] : '0' }}</div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($infos['staleShares']) ? $infos['staleShares'] : '0' }}</div>
                        <div class="text-uppercase text-muted small">Stale Shares</div>
                    </div>
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Earnings Ethermine
                </div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        <div class="text-value-xl">€{{ !empty($infos['unpaid']) ? (str_replace(".", "",substr($infos['unpaid']*$price_eur*100, 0,4))) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Unpaid</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0,{{ !empty($infos['unpaid']) ? substr($infos['unpaid'], 0,3) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Unpaid Eth</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">€{{ !empty($infos['coinsPerMin']) ? str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur, 0,5)) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Average daily</div>
                    </div>
                </div>
                <div class="card-footer">Since last payout:
                    @if(isset($workers))
                    @foreach($workers as $key => $worker)
                    @if ($key == 0)
                    <b>{{ time_diff($worker["paidOn"]) }}</b>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
{{---------------------------------------------------------------------}}


        <div class="col-12 col-xl-3">

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Average Earnings Minerstat</div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        {{-- <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_day']/$price_usd, 0,5)) }}</div> --}}
                        <div class="text-value-xl" style="font-size:21px">€{{ !empty($infos['coinsPerMin']) ? str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur, 0,5)) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Daily</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        {{-- <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_week']/$price_usd, 0,6)) }}</div> --}}
                        <div class="text-value-xl" style="font-size:21px">€{{ !empty($infos['coinsPerMin']) ? str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur*7, 0,5)) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Weekly</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        {{-- <div class="text-value-xl" style="font-size:21px">€{{ str_replace(".", ",",substr($msinfos['usd_month']/$price_usd, 0,6)) }}</div> --}}
                        <div class="text-value-xl" style="font-size:21px">€{{ !empty($infos['coinsPerMin']) ? str_replace(".", "",substr($infos['coinsPerMin']*1440*$price_eur*31, 0,5)) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Monthly</div>
                    </div>
                </div>
                <div class="card-footer">Current Ether price:
                    <b>€{{ !empty($msinfos['cprice']) ? floor($msinfos['cprice']/$price_usd *100)/100 : '???' }} / ${{ !empty($msinfos['cprice']) ? floor($msinfos['cprice'] *100)/100 : '???' }}</b>
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Minerstat</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl" style="font-size: 22px">{{ !empty($msinfos['status']) ? strtoupper($msinfos['status']) : '0' }}</div>
                        <div class="text-uppercase text-muted small">Uptime</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($msinfos['consumption']) ? $msinfos['consumption'] : '0' }} W</div>
                        <div class="text-uppercase text-muted small">Consumption</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ !empty($msinfos['devices']) ? $msinfos['devices'] : '0' }}</div>
                        <div class="text-uppercase text-muted small">Rigs</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">
                            @if(isset($msinfos['status']))
                                @foreach($msinfos['shares'] as $share)
                                    @if($loop->first){{ $share}}
                                    @endif
                                @endforeach
                                @else
                                    0
                            @endif</div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0</div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">TREX</div>
                        <div class="text-uppercase text-muted small">Software</div>
                    </div>
                </div>
                <div class="card-footer">Pool:
                    <b>{{ !empty($msinfos['pool']) ? $msinfos['pool'] : 'Unknown' }}</b>
                </div>
            </div>
        </div>


        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Minerstat Data</div>
                <div class="card-body" style="height: 450px; overflow-y: scroll;">
                    <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                        <div style="margin: 15px">
                                <div id="app">
                                    @{{ message }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{----------------------------------------------------------------------------------}}



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
{{-- @endif --}}
@endsection
