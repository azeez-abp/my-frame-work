<?php

function swapThrough($arr)
{
    $len  = 0;
    while ($len < count($arr) - 1) {
        $temp  = $arr[(count($arr) - 1) - $len];
        $arr[(count($arr) - 1) - $len]   = $arr[$len];
        $arr[$len]  = $temp;
        $len++;
    }

    print_r($arr);
}

swapThrough([20, 30, 40, 50, 60, 70]);
