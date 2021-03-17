@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($workers as $worker)
                        <p>Payout: 0,0{{ $worker['amount'] }}</p>
                        <p>{{ date("Y, F j - H:i:s", $worker['time']) }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
