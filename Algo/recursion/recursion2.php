<?php


function recurse($arr, $i, $target, $ans)
{

    if ($target < 0) {
        return;
    }
    if ($target === 0) {
        print_r($ans);
        return;
    }


    if ($i === count($arr)) {


        return;
    }
    $ans[]  = $arr[$i];
    recurse($arr, $i + 1, $target - $arr[$i], $ans);
    unset($ans[count($ans) - 1]);

    recurse($arr, $i + 1, $target, $ans);
}
// $ans = [];
// $target  = 90;
// recurse([10, 30, 40, 50, 80], 0, $target, $ans);

// print_r($ans);


function subset($arr, $ans, $i)
{

    if (count($arr) == $i) {
        print_r($ans);
        // print_r($arr);
        return;
    }

    for ($p = 0; $p < count($arr); $p++) {
        $cur  = array_shift($arr);
        $ans[]    = $cur;
        array_push($arr, $cur);
        subset($arr, $ans, $i + 1); # code...
    }


    // print_r($arr);
}

//subset([1, 2, 3], [], 0);


function generateSubset($index, $nums, &$subset, &$res)
{
    $subset;
    if ($index >= count($nums)) { //loo p finish
        return  array_push($res, $subset);
    }

    array_push($subset, $nums[$index]);
    generateSubset($index + 1, $nums, $subset, $res);
    array_pop($subset); ////empty subset container
    generateSubset($index + 1, $nums, $subset, $res);
    return $res;
}

// $subset  = [];
// $res = [];

// print_r(generateSubset(0, [1, 2, 3], $subset, $res));


function generateSubset2($index, $nums, $subset, &$res, $target)
{
    $subset;

    if ($target < 0) {
        return;
    }

    if ($index >= count($nums)) { //loo p finish
        if ($target === 0) {
            array_push($res, $subset);
        }
        return;
    }

    array_push($subset, $nums[$index]);
    generateSubset2($index + 1, $nums, $subset, $res, $target - $nums[$index]);
    array_pop($subset); ////empty subset container
    generateSubset2($index + 1, $nums, $subset, $res, $target);
    return $res;
}

$subset  = [];
$res = [];

print_r(generateSubset2(0, [1, 2, 3], $subset, $res, 3));
