<?php
function findIn2DSortedArray($array, $target)
{
    ///condition 2d num row  === num col
    $x  = 0;  //first arrray
    $y = sizeof($array) - 1;  // last element in the first array
    //although $y is num of arr then it is also equalls the size of each array in 2d
    // echo $x . "\n";
    // echo $y . "\n";;
    while (($x <  sizeof($array)) && ($y >= 0)) {
        //  echo $array[$x][$y], PHP_EOL;

        if ($array[$x][$y] === $target) {
            //echo $array[$x][$y], PHP_EOL;
            return "found";
        } else if ($array[$x][$y] < $target) {
            ///if last element in each array is less than target come down ,
            $x++;
            // if ($x === 2) {
            //     echo $array[$x][$y];
            //     //  break;
            // }
        } else {
            if ($x === 2) {
                echo $array[$x][$y], " " . $y;
                //  break;
            }
            // continue move to the right
            $y--;
        }
    }

    return 'NOT FOUND'; //false;
}

echo findIn2DSortedArray(
    [
        [1, 2, 3, 4, 5],
        [6, 7, 8, 9, 10],
        [11, 12, 13, 14, 15],
    ],
    8
);