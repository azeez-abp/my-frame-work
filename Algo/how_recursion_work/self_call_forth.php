<?php
function recursionTest($n, $c = 0)
{
    static  $res  = [];


    if ($c == 3) {
        return $res;
    }
    /*the basic principle is the stopping condition of the 
    function each recursion call will shift to the next, if the stopping condition met;
  
*/
/*

*/
    array_push($res, $n . " " . $c);
    recursionTest('help', $c + 1); ////run untill the stopping condition for met run 3
    recursionTest('me', $c + 1); /// run once //then runs and back to top // then runs and proceed down
    recursionTest('God', $c + 1); /// run once 
    //   recursionTest('FROM', $c + 1); /// run once
    return $res;
    //}
}

print_r(recursionTest('start'));
