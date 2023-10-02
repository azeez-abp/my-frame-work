<?php
function tss($arr, $i, $target, $subSetContainer)
{
    /**
     * @requirement : Subset algorithms
     * 
     * check the subset that their sum is the target
     */
    static $res  = [];
    if ($target < 0) {
        //// dont go further is the target is negative
        return;
    }

    if ($i === sizeof($arr)) {
        if ($target === 0) {
            print_r($subSetContainer); // the subset that their sum is the targe
            // return array_push($res, $subSetContainer);
        }
        return array_push($res, $subSetContainer);
    }
    ///////////////////////////////
    array_push($subSetContainer, $arr[$i]);
    tss($arr, $i + 1, $target - $arr[$i], $subSetContainer);
    array_pop($subSetContainer); ////once the subset container has be generated clear it for the next subset
    tss($arr, $i + 1, $target, $subSetContainer);
    /////////////////////////How many times do we need to call the recursion, this depend on how many ways we 
    /// we divide our work load to 
    return $res;
}


$arr = [1, 2, 3];
$i = 0;
$target  = 3;
$subSetContainer  = [];
$sub = tss($arr, $i, $target, $subSetContainer);
print_r($sub);