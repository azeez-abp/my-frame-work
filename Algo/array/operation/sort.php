<?php

function swap($str, $i, $j)
{
    // echo  $str[$i];
    // echo  $str[$j];
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
    return $str;
}
function sorts($arr)
{
    $flag = true;
    while ($flag) {
        $flag =  false;
        for ($i = 0; $i < count($arr) - 1; $i++) {

            if ($arr[$i] > $arr[$i + 1]) {
                $arr  =  swap($arr, $i, $i + 1);
                $flag = true;
            }
            # code...
        }
    }


    return $arr;
}

print_r(sorts([20, 10, 30]));
