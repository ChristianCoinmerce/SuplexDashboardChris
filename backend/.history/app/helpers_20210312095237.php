<?php
if(!function_exists("time_diff")) {
    function time_diff($string) {
        return $string;
    }
}


// <?php
// $date1 = date("Y, F j - H:i:s", $worker['paidOn']);
// $date2 = date("Y, F j - H:i:s");
// $time = date_diff($date1, $date2);

if(!function_exists("payout_eth")) {
    function payout_eth($value) {
        $length = strlen($value);
        $needed = 19 - $length;
        $string = "0,";

        for ($i = 0; $i < $needed; $i++) $string =  $string;

        return $string . $value;
    }
}
