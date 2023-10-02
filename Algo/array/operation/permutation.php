<?php
function swapThrough($arr)
{
    $len  = 0;
    while ($len < count($arr) / 2) {
        $temp  = $arr[(count($arr) - 1) - $len];
        $arr[(count($arr) - 1) - $len]   = $arr[$len];
        $arr[$len]  = $temp;
        $len++;
    }

    print_r($arr);
}

swapThrough([20, 30, 40, 50, 60, 70, 80, 90]);


function permute($str, $l, $r)
{
    if ($l == $r) {
        echo $str . "\n";
    } else {
        for ($i = $l; $i < $r; $i++) { //$l  = left $r = right 
            $str = swap($str, $l, $i); /// swap the left (start) and current 
            permute($str, $l + 1, $r);
            $str = swap($str, $l, $i); // backtrack
        }
    }
}

function swap($str, $i, $j)
{
    // echo  $str[$i];
    // echo  $str[$j];
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
    return $str;
}

// Usage 
$string = "ABC";
$length = strlen($string);
permute($string, 0, $length);
