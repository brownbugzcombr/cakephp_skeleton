<?php

Class TextoHelper extends AppHelper {

    function truncate($str, $len=80, $etc='') {
        $end = array(' ', '.', ',', ';', ':', '!', '?');

        if (strlen($str) <= $len)
            return $str;

        if (!in_array($str{$len - 1}, $end) && !in_array($str{$len}, $end))
            while (--$len && !in_array($str{$len - 1}, $end)

                );

        return rtrim(substr($str, 0, $len)) . $etc;
    }

    function date_diff($date1, $date2) {
        $current = $date1;
        $datetime2 = date_create($date2);
        $count = 0;
        while (date_create($current) < $datetime2) {
            $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
            $count++;
        }
        return $count;
    }

    function get_time_difference($start, $end) {
        $uts['start'] = strtotime($start);
        $uts['end'] = strtotime($end);
        if ($uts['start'] !== -1 && $uts['end'] !== -1) {
            if ($uts['end'] >= $uts['start']) {
                $diff = $uts['end'] - $uts['start'];
                if ($days = intval((floor($diff / 86400))))
                    $diff = $diff % 86400;
                if ($hours = intval((floor($diff / 3600))))
                    $diff = $diff % 3600;
                if ($minutes = intval((floor($diff / 60))))
                    $diff = $diff % 60;
                $diff = intval($diff);
                return( array('days' => $days, 'hours' => $hours, 'minutes' => $minutes, 'seconds' => $diff) );
            }
            else {
                trigger_error("Ending date/time is earlier than the start date/time", E_USER_WARNING);
            }
        } else {
            trigger_error("Invalid date/time data detected", E_USER_WARNING);
        }
        return( false );
    }

}

?>
