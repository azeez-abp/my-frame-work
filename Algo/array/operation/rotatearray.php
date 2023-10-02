<?php

function rotate($array, $int, $mode  = 'r')
{
    $res = [];
    while ($int > 0) {

        $res  = $mode == 'r' ? [$array[sizeof($array) - 1], ...$array] : [...$array, $array[0]];
        print_r($res);
        if ($mode == 'r') {
            unset($res[sizeof($res) - 1]);
        } else {
            unset($res[0]);
        }
        $array  = array_values($res);

        $int--;
    }

    print_r($res);
}

rotate([1, 3, 4, 5, 67, 9], 2, 'l');


function rotateLeft($arr, $num)
{
    $count = count($arr);
    $num = $num % $count; // make sure the number is within range

    // create a new array with the rotated elements
    $result = array_slice($arr, $num);
    $result = array_merge($result, array_slice($arr, 0, $num));

    return $result;
}


function revArr($arr)
{
    $res  = [];

    while (sizeof($arr) - 1 > 0) {
        $res[]   =  array_pop($arr);
    }
    print_r($res);
}
revArr([1, 3, 4, 5, 67, 9]);

function arrRev($arr)
{
    $res   = [];
    $last  = sizeof($arr) - 1;
    while ($last >= 0) {
        $res = [...$res, $arr[$last]];
        $last -= 1;
    }
    return    $res;
}
print_r(arrRev([1, 2, 3, 4, 5, 6]));



function rotateArry($arr, $rotation_num)
{
    ///take element at r to n-r  // n total lenght of the array while r is the position of the element  of in the array
    $r  = 0;
    $n  = count($arr) - 1;
    $res = [];
    while ($r <= $n) {
        if (($r + 1) <= $rotation_num) {
            $res[$r]  = $arr[$n - $r];
        }
        $r++;
    }

    $rem  = (count($arr) - count($res)) - 1;
    $next  = 0;
    while ($rem < count($arr)) {
        $res[$rem]  = $arr[$next];
        $rem++;
        $next++;
    }
}



function rotateArry2($arr, $rotation_num, $next = 0)
{
    static $res  = [];

    if (count($res) === count($arr)) {
        return $res;
    }
    if ($rotation_num >= 1) {
        $res[$next]  = $arr[(count($arr) - 1) - $next];
    } else {
        static $cont = 0;
        $res[$next]  = $arr[$cont];
        $cont++;
    }
    rotateArry2($arr, $rotation_num - 1, $next + 1);

    return $res;
}

print_r(rotateArry2([10, 20, 30, 40, 50, 60, 70], 5));
