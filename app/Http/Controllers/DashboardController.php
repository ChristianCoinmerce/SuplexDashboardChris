<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $payouts = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/payouts/'), true);
        $workers  = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/workers/'), true);
        $worker = $workers['data'];
        $json = $payouts['data'];
        $json2 = $json[1];
        date_default_timezone_set('Europe/Amsterdam');
        $paid_eth = date("Y, F j - H:i:s", $json2['paidOn']);
        $amount = $json2;

        return view('home', ['workers' => $json]);
    }
    public function core()
    {
        return view('core');
    }
}

