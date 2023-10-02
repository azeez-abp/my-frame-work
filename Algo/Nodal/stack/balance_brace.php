<?php
function balanceBracket2($braces)
{
    //echo $braces;

    $open_list = ["[", "{", "("];
    $close_list = ["]", "}", ")"];
    $stack  = []; //unbalance right 
    $unbalance  = []; // unbalce left
    for ($i = 0; $i < strlen($braces); $i++) {
        if (in_array($braces[$i], $open_list)) {
            array_push($stack, $braces[$i]);
            ////put the open brace in the stack
        } elseif (in_array($braces[$i], $close_list)) {
            //if is close brace get its index and find it in open brace
            $pos  = array_search($braces[$i], $close_list);
            $complement_brace  = $open_list[$pos];
           // echo $complement_brace;
            if (in_array($complement_brace, $stack)) {
                print_r($stack);
                array_pop($stack);
            } else {
                array_push($unbalance, $braces[$i]);
            }
            //  exit;
            echo $complement_brace . "\n";
        }
        // print_r($stack);

        echo $i . "\n";
        if ($i === 6) {
            // exit;
        }
    }

    if (!empty($unbalance)) {
        return "Un-Balance open brace is missing";
    }

    if (!empty($stack)) {
        return "Un-Balance close brace is missing";
    }

    return "Balance";
}

echo balanceBracket2("[{}[]()](){}{{[]}}");