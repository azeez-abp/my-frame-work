<?php
//swap tools
function selection_sort_($list)
{

    for ($p = 0; $p < count($list); $p++) {
        //forEach number in the list
        for ($x = 0; $x < count($list); $x++) {
            //forEach number in the list compare to the list it self
            if ($list[$p] < $list[$x]) {
                $temp = $list[$p];
                $list[$p]  = $list[$x];
                $list[$x]  =   $temp;
            }
        }
    }
    return $list;
}