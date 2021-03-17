<?php
if(!function_exists("time_diff")) {
    function time_diff($date) {
        $date1 = new DateTime($date);
        $date2 = new DateTime();
        $date3 = date_create($date);
        // $date3 = date_create($date, "Y, F j - H:i:s");



        dd($date1);
        return date_diff($date1, $date2)->format("%a Day %h Hours");
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
