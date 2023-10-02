<?php

function permutation($list)
{
    $re  = [];

    for ($k = 0; $k < count($list); $k++) {
        $com2  = $list[$k];
        for ($j = 0; $j < count($list); $j++) {
            $com  = $list[$j];
            for ($i = 0; $i < count($list); $i++) {
                $res  =  $com2 . $com . $list[$i];
                array_push($re, $res);
            }
        }
    }

    return $re;
}

print_r(permutation(['a', 'b', 'c', 'd']));



function bitStr($n, $s)
{

    $str_arr  = str_split($s);
    $res  = [];
    while ($n - 1 > 0) {
       
    
        $res  = []; // dump the old result
        for ($i = 0; $i < strlen($s); $i++) {
            for ($p = 0; $p < sizeof($str_arr); $p++) {
                $res  = [...$res,   $s[$i] . $str_arr[$p]];
            }
        }
        if (sizeof($res) > 0) {
            $str_arr  = $res;
        }

        $n--;
    }
    return $res;
}

print_r(bitStr(4, 'abc'));


function bitStrRecur($n, $s)
{
    $res  = [];
    if ($n == 1) return $s;
    $bit  = bitStrRecur(1, $s);
    $byte  =  bitStrRecur($n - 1, $s);
    for ($i = 0; $i < strlen($bit); $i++) {
        $byte  =   gettype($byte) === 'string' ? str_split($byte) : $byte;
        for ($b = 0; $b < sizeof($byte); $b++) {
            $res  = [...$res, $bit[$i] . $byte[$b]];
        }
    }

    return $res;
}

print_r(bitStrRecur(4, 'abcd'));