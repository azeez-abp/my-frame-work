<?php
/*Algorithm
Searching in a sorted and rotated array can be done using a modification of binary search. The key idea is to compare the middle element of the array with the first and last elements to determine which half of the array is sorted, and then apply binary search to that half. If the middle element is greater than or equal to the first element, then the left half of the array is sorted, and we can apply binary search to it. Otherwise, the right half of the array is sorted, and we can apply binary search to it.

The binary search algorithm itself is the same as the standard algorithm. We compare the middle element of the current subarray with the target element, and recursively search the left or right half of the subarray depending on whether the middle element is greater or less than the target element.*/

function search_rotated_array($arr, $target) {
    $n = count($arr);
    $left = 0;
    $right = $n - 1;

    while ($left <= $right) {
        $mid = (int)(($left + $right) / 2);

        if ($arr[$mid] == $target) {
            return $mid;
        }

        // If left half is sorted
        if ($arr[$left] <= $arr[$mid]) {
            // If target is in left half
            if ($target >= $arr[$left] && $target < $arr[$mid]) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        // If right half is sorted
        else {
            // If target is in right half
            if ($target > $arr[$mid] && $target <= $arr[$right]) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
    }

    return -1;
}

// Example usage
$arr = array(4, 5, 6, 7, 8, 1, 2, 3);
$target = 6;
$result = search_rotated_array($arr, $target);
echo $result; // Output: 2



///////////////////////////////////optimize

function findMinInSortedAndRotatedArray($array)
{
    $first  = 0;
    $last  = sizeof($array) - 1;

    while ($first < $last) {
        $mid  = floor($first + $last) / 2;

        if ($array[$mid] < $array[$last]) { ///  elemet after the middle are greate move to middle down
            $last   = $mid;
        } else {
            $first  = $mid + 1;
        }
    }
    return $array[$first];
}
echo findMinInSortedAndRotatedArray([22, 33, 44, 55, 66, 6, 1, 2, 34, 5]);

////////////////////////////////correct 


function search($a, $b)
{
    //WRITE YOUR CODE HERE
    //ket  first < mid < last 
    $first  = 0;
    $last  = count($a) - 1;
    while ($first < $last) {
        $mid  = floor(($first + $last) / 2);
        echo $mid . "\n";
        if ($a[$mid] === $b) {
            return $mid;
        }
        // [9, 10, 3, 5, 6, 8], 5

        // If left half is sorted
        if ($a[$mid] < $a[$last]) {
            //  echo "yes" . "\n";
            // If target is in left half
            if (($a[$mid] <  $b)   && ($b < $a[$last])) { //target is between middle and last
                $first = $mid + 1;
            } else {
                $last = $mid;
            }
        }
        // If right half is sorted
        else {
            // echo "no" . "\n";
            // If target is in right half
            if (($a[$mid] > $b)  && ($b > $a[$first])) {
                $last = $mid;
            } else {
                $first = $mid + 1;
            }
        }
    }

    return -1;
}


echo search([1, 7, 67, 133, 178], 1);