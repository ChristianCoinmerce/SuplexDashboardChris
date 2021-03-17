@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="card" style="width: 300px">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($workers as $worker)
                        <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                            <div style="margin: 10px">
                                <p>Payout ETH: 0,0{{ substr($worker['amount'], 0,9) }}</p>
                                <p>Payout EUR:  €{{ substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2, '.', ','), 0,6) }}</p>
                                <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p>
                                <p></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="margin:10px"></div>
        <div class="col-xs-6">
            <div class="card" style="width: 300px">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($workers as $worker)
                        <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                            <div style="margin: 10px">
                                <p>Payout ETH: 0,0{{ substr($worker['amount'], 0,9) }}</p>
                                <p>Payout EUR:  €{{ substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2, '.', ','), 0,6) }}</p>
                                <p>{{ date("Y, F j - H:i:s", $worker['paidOn']) }}</p>
                                <p></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
