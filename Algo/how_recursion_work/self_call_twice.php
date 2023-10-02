<?php
function recursionTest($n, $c = 0)
{
    static  $res  = [];

    if ($c == 3) {
        return $res;
    }
    array_push($res, $n . " " . $c);   ////===>from top to bottom output
    recursionTest('help', $c + 1);
    //=>stop point during function call; once the function call 
    // has finish the next line of the code begins eecution and the stack will be removing once 
    // at a time
    /*
     once the condition has met 
   */
    //  array_push($res, $n . " " . $c); ///this happen after all the function call and generate bottom to top output
    //The stack must be full before shift(removing the top element); 

    return $res;
}

print_r(recursionTest('start'));
