<?php
/////optimize
function recurse($arr)
{
    $t  = 0;

    $start  = 0;
    $end  = count($arr);
    $count  = 0;
    while ($count < $end) {
        echo $arr[$count] . " " . $arr[$start] . "\n";
        $start++;
        if ($start == $end) {
            $count += 1;
            $start  = 0;
        }
    }
}

recurse([1, 2, 3]);



function recurse2($arr)
{
    $t  = 0;
    for ($i = 0; $i < sizeof($arr); $i++) {
        for ($j = 0; $j < sizeof($arr); $j++) {
            $t += 1;
            echo $arr[$i] . " " . $arr[$j] . "  $t\n";
        }
    }
}

recurse2([1, 2, 3]);