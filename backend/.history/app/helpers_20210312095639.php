<?php
if(!function_exists("time_diff")) {
    function time_diff($date) {
        $date1 = date("Y, F j - H:i:s", $date);
        $date2 = date("Y, F j - H:i:s");

        dd($date1);
        return date_diff($date1, $date2);
    }
}


// <?php


if(!function_exists("payout_eth")) {
    function payout_eth($value) {
        $length = strlen($value);
        $needed = 19 - $length;
        $string = "0,";

        for ($i = 0; $i < $needed; $i++) $string =  $string;

        return $string . $value;
    }
}
