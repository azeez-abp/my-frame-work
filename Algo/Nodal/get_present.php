<?php

function getPrimeNumber($arr)
{
    $prime  = [];
    for ($i = 0; $i < count($arr); $i++) {
        $count = 0;
        for ($j = 1; $j <= $arr[$i]; $j++) {
            if ($arr[$i] % $j === 0) {
                $count++;
            }
        }

        if ($count === 2) {

            array_push($prime, $arr[$i]);
        }
    }
    return $prime;
}
print_r(getPrimeNumber([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 23]));
