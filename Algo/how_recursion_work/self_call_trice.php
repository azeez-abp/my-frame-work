<?php

function recursionTest($n, $c = 0)
{
    static  $res  = [];


    if ($c == 3) {
        return $res;
    }
    //else { 

    recursionTest('help', $c + 1); //=> this will read first untill the condition is met(stack is full)
    //after condition is met for function above recursionTest('help', $c + 1), the    array_push($res, $n . " " . $c); //// run after stack is full and stack will be shifted
    //this run again when the condition is not met
    /*
     once the condition has met 
   */

    recursionTest('me', $c + 1); //=>//// run when stack is full
    // recursionTest('God', $c + 1);
    // recursionTest('time', $c + 1);
    array_push($res, $n . " " . $c); //// run after stack is full

    echo "\n";
    echo "=============$c";
    echo "\n";
    return $res;
    //}
}

print_r(recursionTest('start'));