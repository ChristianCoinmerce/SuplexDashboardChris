@extends('layouts.dashboard')

@section('content')
<div class="container-fluid" style="margin-left: 0px;">
    <div class="row">

        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Payouts All Rigs</div>
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
                <div class="card-header" style="font-size: 15px">Worker Info</div>
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
                <div class="card-header" style="font-size: 15px">Earnings
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">€{{ substr(number_format(str_replace(".", "",$infos['unpaid']*$price_eur*100), 1), 0,5) }}</div>
                        <div class="text-uppercase text-muted small">Unpaid</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0,{{ substr($infos['unpaid'], 0,3) }}</div>
                        <div class="text-uppercase text-muted small">Unpaid Eth</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">€{{ substr(number_format(str_replace(".", "",$infos['coinsPerMin']*1440*$price_eur), 2), 0,5) }}</div>
                        <div class="text-uppercase text-muted small">Average daily</div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>


            <div class="card" style="overflow:hidden;">
                <div class="card-header" style="font-size: 15px">
                    <div class="row">
                        <div style="margin-left:17px" class="col-xs-6">Earnings </div>
                        <div style="margin-left:52%" class="col-xs-6">@foreach($workers as $key => $worker)
                            @if ($key == 0)
                            {{ time_diff($worker["paidOn"]) }}
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 125px; overflow:hidden;">


                    <table class="table" style="border: none" cellspacing="0" cellpadding="0">
                        <thead">
                            <tr colspan="5">
                                <th scope="col" style="cursor:pointer;">Unpaid €</th>
                                <th scope="col" style="cursor:pointer;">Unpaid <i class="fab fa-ethereum"></i>

</th>
                                <th scope="col" style="cursor:pointer;">Estimated</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size:20px;">
                                        €{{ substr(number_format(str_replace(".", "",$infos['unpaid']*$price_eur*100), 1), 0,5) }}
                                    </td>
                                    <td style="font-size:20px">0,{{ substr($infos['unpaid'], 0,6) }}</td>
                                    <td style="font-size:20px;">
                                        €{{ substr(number_format(str_replace(".", "",$infos['coinsPerMin']*1440*$price_eur), 2), 0,5) }}
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>



{{-- ------------------------------------------------------- --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg">9.823</div>
                        <div>Members online</div>
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

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-info">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg">9.823</div>
                        <div>Members online</div>
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
                    <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70" width="258"
                        style="display: block; width: 258px; height: 70px;"></canvas>
                    <div id="card-chart2-tooltip" class="c-chartjs-tooltip top"
                        style="opacity: 0; left: 104.76px; top: 127.516px;">
                        <div class="c-tooltip-header">
                            <div class="c-tooltip-header-item">March</div>
                        </div>
                        <div class="c-tooltip-body">
                            <div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color"
                                    style="background-color: rgb(51, 153, 255);"></span><span
                                    class="c-tooltip-body-item-label">My First dataset</span><span
                                    class="c-tooltip-body-item-value">9</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg">9.823</div>
                        <div>Members online</div>
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
                <div class="c-chart-wrapper mt-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="290"
                        style="display: block; width: 290px; height: 70px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-danger">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg">9.823</div>
                        <div>Members online</div>
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
                    <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70" width="258"
                        style="display: block; width: 258px; height: 70px;"></canvas>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
