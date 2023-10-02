<?php

function spiralPrint($arr)
{
    $rmin = 0;
    $rmax  = sizeof($arr) - 1;
    $cmin = 0;
    $cmax  = sizeof($arr[0]) - 1;
    $r  =  sizeof($arr);
    $c  =  sizeof($arr[0]);

    $count  = 0;

    while ($count < $r * $c) {

        ///////////////////////////////////////////////////////////////////////////////////////////////////////// col and row form min to max
        //////////top boundary from smallest col to largest col
        for ($col1 = $cmin; $col1 <= $cmax; $col1++) {
            echo $arr[$rmin][$col1]; /////vertical printing from higer to lower
            $count++;
        }

        $rmin++; ///go right
        //////////right boundary  from smallest row to largest row
        for ($row1 = $rmin; $row1 <= $rmax; $row1++) {
            echo $arr[$row1][$cmax]; /////// horizontal printing from higer to lower
            $count++;
        }
        $cmax--; ///// go down

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// col and row form max to min

        //////////bottom boundary from larest colum to smallest colum
        for ($col2 = $cmax; $col2 >= $cmin; $col2--) {
            echo $arr[$rmax][$col2];  /////// horizontal printing from lower to higer 
            $count++;
        }
        $rmax--; /// go left

        //echo $rmax . ' right ' .  $rmin;
        //////////right boundary from larest row to smallest row
        for ($row2 = $rmax; $row2 >= $rmin; $row2--) {
            echo $arr[$row2][$cmin];  //////vertical printing from lower to higer
            $count++;
        }
        $cmin++; /// go up
    }
    // print_r($count++);
}

spiralPrint(
    [
        ['a', 'b', 'c', 'd', 'e'],
        ['f', 'g', 'h', '8', 'p'],
        ['i', 'j', 'k', 'l', 'o']

    ]
);
