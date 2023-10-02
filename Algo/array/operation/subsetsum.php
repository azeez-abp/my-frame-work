<?php
function isSubsetSum($set, $n, $sum)
{
    $dp = array();

    for ($i = 0; $i <= $n; $i++) {
        $dp[$i][0] = true;
    }

    for ($i = 1; $i <= $sum; $i++) {
        $dp[0][$i] = false;
    }

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $sum; $j++) {
            if ($set[$i - 1] > $j) {
                $dp[$i][$j] = $dp[$i - 1][$j];
            } else {
                $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i - 1][$j - $set[$i - 1]];
            }
        }
    }

    return $dp[$n][$sum];
}

// Example usage:
$set = array(3, 34, 4, 12, 5, 2);
$sum = 9;
$n = count($set);
if (isSubsetSum($set, $n, $sum) == true) {
    echo "Found a subset with given sum";
} else {
    echo "No subset with given sum";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////





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

////sunset sum
function generateSubsetSum($index, $nums, $subset, &$res, $target)
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

print_r(generateSubsetSum(0, [1, 2, 3], $subset, $res, 3));
