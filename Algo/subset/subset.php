<?php
function subset()
{

    function appendAtBcginningFront($a, $input, &$res)
    {

        for ($i = 0; $i < count($input); $i++) {
            array_push($res, $a . ' ' . $input[$i]);
        }
        echo "===========================";
        Print_r($res);
        return $res;
    }



    function bitStrings($n)
    {

        $res  = [];
        echo $n . "\n";


        if ($n == 0) {
            return [];
        }
        //else
        if ($n == 1) {
            return ["O", "l",];
        } else {
            return (appendAtBcginningFront("O", bitStrings($n - 1),  $res) + appendAtBcginningFront("l", bitStrings($n - 1), $res)

                //+ appendAtBcginningFront("2", bitStrings($n - 1))
            );
        }
    }


    $a  = ['a', 'b', 'c'];
    $l  = count($a);
    echo "======================================================";
    print_r(bitStrings(7));
}
subset();