<?php
function firstAndLastIndexOfN($arr, $target)
{
    sort($arr);
    $start = 0;
    $last  = sizeof($arr) - 1;
    $firstIndex = -1;
    $lastIndex = -1;
    //$mid  = $last + ($start - $last) / 2;
    $indexes = [];
    // echo $mid . ' ' . $mid2 . ' ' . $arr[$mid2];

    ///////////////////////////////////////////////find the first index
    while ($start <= $last) {
        $mid  = floor(($last + $start) / 2);

        if ($arr[$mid] === $target) {
            $firstIndex  = $mid;
            $last  = $mid - 1;
            $indexes[]  = $firstIndex;
        } else if ($arr[$mid] < $target) {
            ///looke ahead
            $start  = $mid + 1;
        } else {
            $last  = $mid - 1;
        }
    }


    ///////////////////////////////////////////////find the last index
    while ($start <= $last) {
        $mid  = floor(($last + $start) / 2);
        echo $mid . "\n";
        if ($arr[$mid] === $target) {
            $lastIndex  = $mid;
            $start  = $mid + 1;
            $indexes[] =  $end;
            return true;
        } else if ($arr[$mid] < $target) {
            ///looke ahead
            $start  = $mid + 1;
        } else {
            $last  = $mid - 1;
        }
    }

    print_r($indexes);
}

firstAndLastIndexOfN([23, 34, 3, 43, 34, 4, 4, 4, 104, 34, 2, 3, 34, 2, 3232, 3, 34, 232, 3, 2], 34);