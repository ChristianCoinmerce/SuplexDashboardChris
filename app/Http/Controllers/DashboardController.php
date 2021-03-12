<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {   
        //0x035f9fb6a1e22e5659e7555d211418038154b8e4
        $exchange = json_decode(file_get_contents('https://api.nomics.com/v1/currencies/ticker?key=76b6c005916b60c4a888b7f34d95ca6d&ids=ETH&interval=1d,30d&convert=EUR&per-page=100&page=1'), true);
        $payouts1 = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/payouts/'), true);
        $payouts = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/payouts/'), true);
        $workers  = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/currentStats/'), true);
        $workers1  = json_decode(file_get_contents('https://api.ethermine.org/miner/0x035f9fb6a1e22e5659e7555d211418038154b8e4/workers/'), true);
        $exchange = $exchange[0];
        $worker = $workers['data'];

        // dd($worker['reportedHashrate']);
        $json = $payouts['data'];
        $json2 = $json[1];
        $amount_eur = $json2['amount']/1 * $exchange['price'];
        date_default_timezone_set('Europe/Amsterdam');
        return view('home', ['workers' => $json, 'price_eur' => $exchange['price'],'infos'=> $worker]);
    }
    public function core()
    {
        return view('core');
    }
}

