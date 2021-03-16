<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //minerstat api  -  xyuc4k2s5cju
        $minerstat = json_decode(file_get_contents('https://api.minerstat.com/v2/stats/xyuc4k2s5cju/Garage-Rig-1'), true);

        if(isset($minerstat["error"])) {
            return view('home1');
        }
        $ms = $minerstat['GARAGE-RIG-1'];
        $msinfo = $ms['info'];
        if($msinfo['status'] == "online"){
            $ms1 = $ms['hardware'];
            $ms2 = $ms['revenue']+$ms['mining']+$ms['info'];
        }else{
            $ms1 = 'none';
            $ms2 = 'none';
        }

        //0x035f9fb6a1e22e5659e7555d211418038154b8e4
        //0x5ce7affc1f612e0e6b2181e96a605471e66e1478
        $exchange = json_decode(file_get_contents('https://api.nomics.com/v1/currencies/ticker?key=76b6c005916b60c4a888b7f34d95ca6d&ids=ETH&interval=1d,30d&convert=EUR&per-page=100&page=1'), true);
        $dollar = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'), true);
        $payouts1 = json_decode(file_get_contents('https://api.ethermine.org/miner/0x5ce7affc1f612e0e6b2181e96a605471e66e1478/payouts/'), true);
        $payouts = json_decode(file_get_contents('https://api.ethermine.org/miner/0x5ce7affc1f612e0e6b2181e96a605471e66e1478/payouts/'), true);
        $workers  = json_decode(file_get_contents('https://api.ethermine.org/miner/0x5ce7affc1f612e0e6b2181e96a605471e66e1478/currentStats/'), true);
        $workers1  = json_decode(file_get_contents('https://api.ethermine.org/miner/0x5ce7affc1f612e0e6b2181e96a605471e66e1478/workers/'), true);
        $exchange = $exchange[0];
        $dollar = $dollar['rates'];
        $worker = $workers['data'];
        $json = $payouts['data'];
        $json2 = $json[1];
        $amount_eur = $json2['amount']/1 * $exchange['price'];
        date_default_timezone_set('Europe/Amsterdam');

        return view('home1', ['workers' => $json, 'price_usd'=>$dollar['USD'],'price_eur' => $exchange['price'],'infos'=> $worker, 'minerstat'=> $ms1, 'msinfos'=>$ms2]);
    }

    public function pop()
    {
        return view('home');
    }

    public function core()
    {
        return view('core');
    }
}

