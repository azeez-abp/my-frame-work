<?php

function threeSumOptimized($array, $target)
{
    sort($array); //sorting
    //print_r($array);
    $n = count($array); //[2,7,4,0,9,5,1,3] 
    $result = [];

    for ($i = 0; $i < $n /* - 2*/; $i++) {

        if ($i > 0 && $array[$i] == $array[$i - 1]) {
            //remove duplicate
            continue;
        }

        $left = $i + 1;
        $right = $n - 1;
        $val   = $target  - $array[$i];
        while ($left < $right) {
           // $tot  = $array[$i] + $array[$right] + $array[$left];
            //echo "triplet is {$array[$i]} {$array[$left]} {$array[$right]} = " .  $tot . "\n";
            if (($array[$left] + $array[$right]) === $val) {
                $result[]  = [$array[$i], $array[$right], $array[$left]];
                $left++;
                $right--;
            } else if ($array[$left] + $array[$right] <  $val) {
                $left++;
            } else {
                $right--;
            }
            // print_r($array);
            // $left++;
        }
    }
    return $result;
}
$arr = [1, 2, 3, 5, 6, 11, 15, 16, 17, 18];
$sum = 20;
//[2, 7, 4, 0, 9, 5, 1, 3]
$size = sizeof($arr);

print_r(threeSumOptimized($arr, 20));
/*
This optimized implementation uses a two-pointer approach, which reduces the time complexity from O(n^3) to O(n^2). It first sorts the array, and then iterates through the array with a loop, using two pointers to keep track of the indices of the numbers to be summed. 
If the sum of the three numbers is zero, the three numbers are added to the result array. 
If the sum is less than zero, the left pointer is moved to the right. 
If the sum is greater than zero, the right pointer is moved to the left. 
This way, the algorithm is able to efficiently find all the unique combinations of three numbers in the array that add up to zero.



*/





function fourSum($nums, $target) {
    $result = array();
    $n = count($nums);
    sort($nums);

    for ($i = 0; $i < $n - 3; $i++) {
        // skip duplicates
        if ($i > 0 && $nums[$i] == $nums[$i-1]) continue;

        for ($j = $i + 1; $j < $n - 2; $j++) {
            // skip duplicates
            if ($j > $i + 1 && $nums[$j] == $nums[$j-1]) continue;

            $left = $j + 1;
            $right = $n - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];
                if ($sum == $target) {
                    $result[] = array($nums[$i], $nums[$j], $nums[$left], $nums[$right]);
                    // skip duplicates
                    while ($left < $right && $nums[$left] == $nums[$left+1]) $left++;
                    while ($left < $right && $nums[$right] == $nums[$right-1]) $right--;
                    $left++;
                    $right--;
                } elseif ($sum < $target) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }
    }

    return $result;
}



function threeSumOptimized2($array, $target)
{
    sort($array); //sorting
    //print_r($array);
    $n = count($array); //[2,7,4,0,9,5,1,3] 
    $result = [];

    for ($i = 0; $i < $n /* - 2*/; $i++) {

        if ($i > 0 && $array[$i] == $array[$i - 1]) {
            //remove duplicate
            continue;
        }

        $left = $i + 1;
        $right = $n - 2;
        // $val   = $target  - $array[$i];
        $val   = $target  -    ($array[$i] + $array[$right] + $array[$left]);
        while ($left < $right) {
            $tot  = $array[$i] + $array[$right] + $array[$left];
            echo "triplet is {$array[$i]} {$array[$left]} {$array[$right]} = " .  $tot . "\n";
            //  if (($array[$left] + $array[$right]) === $val) {
            if (0 === $val) {
                $result[]  = [$array[$i], $array[$right], $array[$left]];
                $left++;
                $right--;
            } else if (0  <  $val) {
                $left++;
            } else {
                $right--;
            }
        }
    }
    return $result;
}
$arr = [1, 2, 3, 5, 6, 11, 15, 16, 17, 18];
$sum = 20;
//[2, 7, 4, 0, 9, 5, 1, 3]
$size = sizeof($arr);

print_r(threeSumOptimized2($arr, 20));


/*
Explanation:

First, we create an empty $result array to store the 4-tuples that sum to the target. We also get the length of the input array $nums and sort it in ascending order.

We use two nested loops to iterate over all possible pairs of elements in the array. We skip duplicates to avoid redundant computations. We also use the fact that the array is sorted to optimize the algorithm.

Within the nested loops, we use two pointers, $left and $right, to find the remaining two elements that sum to the target. We move the pointers closer together based on the sum of the four elements, until we either find a match or exhaust all possible pairs.

When we find a 4-tuple that sums to the target, we add it to the $result array and skip over any duplicates that occur between the pointers. We then move the pointers closer together and continue searching.

Once all possible 4-tuples have been searched, we return the $result array.

This algorithm has a time complexity of O(n^3), where n is the length of the input array. It is also optimal in the sense that it cannot be solved in less than O(n^3) time.




Regenerate response*/