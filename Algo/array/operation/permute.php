<?php
function permute($items, $perms = array())
{
    if (empty($items)) {
        // If there are no items left, then we have a permutation
        print_r($perms);
    } else {
        // Loop through each item in the array
        for ($i = 0; $i < count($items); $i++) {
            // Remove the current item from the array and save it to a variable
            $newItems = $items;
            $newPerms = $perms;
            $item = array_splice($newItems, $i, 1)[0];
            // Add the item to the permutations array
            array_push($newPerms, $item);
            // Recursively generate all permutations of the remaining items
            permute($newItems, $newPerms);
        }
    }
}




function duplicateArr($items, $loc)
{
    static $arr_num  = 0;
    static $res  = [];
    static $each = [];
    if ($loc === sizeof($items)) {
        return $res;
    }

    $each  = [...$each, $items[$loc]];
    if (($arr_num < sizeof($items)) && ($loc === sizeof($items) - 1)) {
        $arr_num++;
        $loc = -1;
        $res  = [...$res,  $each];
        $each  = [];
    }
    duplicateArr($items, $loc + 1);


    return $res;
}


//print_r(duplicateArr([1, 2, 3, 4], 0));



// function permutation($str, $select, $pos, &$ans)
// {
//     static $each  = [];
//     if ($pos == count($str)) {
//         return $ans[]  = $each;
//     }
//     for ($i = 0; $i < count($str); $i++) {
//         if ($select[$i] == 0) {
//             $select[$i] = 1;
//             $each[]  = $str[$i];
//             permutation($str, $select, $pos + 1, $ans);
//             $select[$i] = 0;
//             unset($each[count($each) - 1]);
//         }
//     }
// }

// $str = ['a', 'b', 'c'];
// $select = array_fill(0, count($str), 0);
// $ans  = [];
// permutation($str, $select, 0, $ans);

// print_r($ans);

function swap($str, $i, $j)
{
    // echo  $str[$i];
    // echo  $str[$j];
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
    return $str;
}
function permutation($arr, $pos, &$ans)
{
    if ($pos == count($arr)) {
        $ans[] = $arr;
        return;
    }
    for ($i = 0; $i < count($arr); $i++) {
        [$arr[$pos], $arr[$i]] = [$arr[$i], $arr[$pos]];
        permutation($arr, $pos + 1, $ans);
        [$arr[$i], $arr[$pos]] = [$arr[$pos], $arr[$i]];
    }
    return $ans;
}

$str = ['a', 'b', 'c'];
//$select = array_fill(0, count($str), 0);
$ans  = [];
print_r(permutation($str, 0, $ans));



function testRecur($n, &$forwardAns, &$backtrackAns)
{
    if ($n == 4) {
        return $n;
    }
    $forwardAns[] = $n;
    testRecur($n + 1, $forwardAns, $backtrackAns);
    $backtrackAns[] = $n;
}
// $f  = [];
// $b  = [];
// testRecur(0, $f, $b);

// print_r($f);
// print_r($b);

function revWord($str, $pos, &$ans)
{

    if ($pos === strlen($str)) {
        return $ans;
    }

    revWord($str, $pos + 1, $ans);
    $ans  .= $str[$pos];
}

// $ans2 = "";
// revWord('azeez', 0, $ans2);
// echo $ans2;


///////////////////////////////////////////////////////////////////////



function testRecur2($n, &$forwardAns, &$backtrackAns)
{
    if ($n == 4) {
        return $n;
    }
    for ($i = 0; $i < 4; $i++) {
        $forwardAns[] = $n;
        testRecur($n + 1, $forwardAns, $backtrackAns);
        $backtrackAns[] = $n; # code...
    }
}
$f  = [];
$b  = [];
testRecur2(0, $f, $b);

// print_r($f);
// print_r($b);



function permute3($arr)
{
    $result = []; // To store the permutations

    // Helper function to generate permutations recursively
    function backtrack(&$arr, $start, &$result)
    {
        // If all elements have been used, add the current permutation to the result
        if ($start == count($arr)) {
            $result[] = $arr;
            return;
        }

        for ($i = $start; $i < count($arr); $i++) {
            // Swap the current element with the start element
            [$arr[$start], $arr[$i]] = [$arr[$i], $arr[$start]];

            // Generate permutations for the remaining elements
            backtrack($arr, $start + 1, $result);

            // Undo the swap to backtrack
            [$arr[$start], $arr[$i]] = [$arr[$i], $arr[$start]];
        }
    }

    // Start the recursion
    backtrack($arr, 0, $result);

    return $result;
}

$array = [1, 2, 3, 7, 9];
$permutations = permute3($array);
print_r($permutations);
