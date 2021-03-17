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
                                <p>Payout EUR:  €{{ substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2), 0,6) }}</p>
                                <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card" style="height: 300px; overflow:hidden;">
                <div class="card-header" style="font-size: 15px">Worker Info</div>
                <div class="card-body" style="height: 450px; overflow:hidden;">


                    <table class="table" style="border: none" cellspacing="0" cellpadding="0">
                        <thead">
                            <tr colspan="5" >
                                <th scope="col" style="cursor:pointer;">Local</th>
                                <th scope="col" style="cursor:pointer;">Online</th>
                                <th scope="col" style="cursor:pointer;">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  >
                                <td style="font-size:20px;">{{ substr($infos['reportedHashrate'], 0,3) }} MH/s</td>
                                <td style="font-size:20px">{{ substr($infos['currentHashrate'], 0,3) }} MH/s</td>
                                <td style="font-size:20px">{{ substr($infos['averageHashrate'], 0,3) }} MH/s</td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="table" style="border: none" cellspacing="0" cellpadding="0">
                        <thead">
                            <tr>
                                <th scope="col" style="cursor:pointer;">Valid</th>
                                <th scope="col" style="cursor:pointer;">Rejected</th>
                                <th scope="col" style="cursor:pointer;">Stale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size:20px;">{{ $infos['validShares'] }} Shares</td>
                                <td style="font-size:20px">{{ $infos['invalidShares'] }} Shares</td>
                                <td style="font-size:20px">{{ $infos['staleShares'] }} Shares</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="font-size: 15px">
                    <div class="row"><div style="margin-left:17px" class="col-xs-6">Earnings </div>
                        <div style="margin-left:52%" class="col-xs-6" >@foreach($workers as $key => $worker)
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
                            <tr colspan="5" >
                                <th scope="col" style="cursor:pointer;">Unpaid Euro</th>
                                <th scope="col" style="cursor:pointer;">Unpaid Eth</th>
                                <th scope="col" style="cursor:pointer;">Estimated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size:20px;">€{{ substr(number_format(str_replace(".", "",$infos['unpaid']*$price_eur*100), 1), 0,5) }}</td>
                                <td style="font-size:20px">0,{{ substr($infos['unpaid'], 0,6) }}</td>
                                <td style="font-size:20px;">€{{ substr(number_format(str_replace(".", "",$infos['coinsPerMin']*1440*$price_eur), 2), 0,5) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                                <p>Payout EUR:  €{{ substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2), 0,6) }}</p>
                                <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card" style="height: 300px; overflow:hidden;">
                <div class="card-header" style="font-size: 15px">Worker Info</div>
                <div class="card-body" style="height: 450px; overflow:hidden;">


                    <table class="table" style="border: none" cellspacing="0" cellpadding="0">
                        <thead">
                            <tr colspan="5" >
                                <th scope="col" style="cursor:pointer;">Local</th>
                                <th scope="col" style="cursor:pointer;">Online</th>
                                <th scope="col" style="cursor:pointer;">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  >
                                <td style="font-size:20px;">{{ substr($infos['reportedHashrate'], 0,3) }} MH/s</td>
                                <td style="font-size:20px">{{ substr($infos['currentHashrate'], 0,3) }} MH/s</td>
                                <td style="font-size:20px">{{ substr($infos['averageHashrate'], 0,3) }} MH/s</td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="table" style="border: none" cellspacing="0" cellpadding="0">
                        <thead">
                            <tr>
                                <th scope="col" style="cursor:pointer;">Valid</th>
                                <th scope="col" style="cursor:pointer;">Rejected</th>
                                <th scope="col" style="cursor:pointer;">Stale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size:20px;">{{ $infos['validShares'] }} Shares</td>
                                <td style="font-size:20px">{{ $infos['invalidShares'] }} Shares</td>
                                <td style="font-size:20px">{{ $infos['staleShares'] }} Shares</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="font-size: 15px">
                    <div class="row"><div style="margin-left:17px" class="col-xs-6">Earnings </div>
                        <div style="margin-left:52%" class="col-xs-6" >@foreach($workers as $key => $worker)
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
                            <tr colspan="5" >
                                <th scope="col" style="cursor:pointer;">Unpaid Euro</th>
                                <th scope="col" style="cursor:pointer;">Unpaid Eth</th>
                                <th scope="col" style="cursor:pointer;">Estimated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size:20px;">€{{ substr(number_format(str_replace(".", "",$infos['unpaid']*$price_eur*100), 1), 0,5) }}</td>
                                <td style="font-size:20px">0,{{ substr($infos['unpaid'], 0,6) }}</td>
                                <td style="font-size:20px;">€{{ substr(number_format(str_replace(".", "",$infos['coinsPerMin']*1440*$price_eur), 2), 0,5) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
