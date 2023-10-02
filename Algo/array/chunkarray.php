<?php

function divedeArray($arr, $dividedInto  = 2)
{

    $start = 0;
    $end  = 0;
    $tot   = [];
    for ($i = 0; $i < count($arr) - 1; $i++) { //----------------------------n+1  $i
        $res  = []; 
        for ($p = $start; $p < $end + $dividedInto; $p++) { //-----------------n(n+1) $p 
            if (count($arr) >= $end && !empty($arr[$p])) {
                array_push($res, $arr[$p]); // --------------  n(n+1)
            }
        }
        $start += $dividedInto;    /// n
        $end  += $dividedInto;    // n
        if (!empty($res)) array_push($tot, $res);//n
    }
    return $tot;
}


//divedeArray([1, 2, 3, 34, 5, 6, 7, 78, 8, 9, 9, 90]);
print_r(divedeArray([1, 2, 3, 34, 5, 6, 7, 78, 8, 9, 9, 90]));




function infixToPostFix($expr)
{
    $oprator = ['+', '-', '*', '/', '(', ')'];
    $stack_sign  = [];
    $post_chr  = [];
    for ($i = 0; $i < strlen($expr); $i++) {
        if (in_array($expr[$i], $oprator)) {
            array_push($stack_sign, $expr[$i]);
        }

        if (!in_array($expr[$i], $oprator)) {
            array_push($post_chr, $expr[$i]);
        }
    }

    $res = join("", [...$post_chr, ...$stack_sign]);
    return $res;
}

print_r(infixToPostFix('x+(y*z)'));


$a =  [10, 20, 30, 40, 50, 60, 70, 80, 90];
function reverseFrom($arr, $k)
{
    $n = $k + 1;
    $firstPArtDone  = false;
    $res = [];
    $len  = count($res) - 1;
    while (!$firstPArtDone) {
        $len++;
        $res[$len]  = $arr[$k];
        $k--;
        if ($k == -1) {
            $firstPArtDone  = true;
        }
    }

    $secondPArtDone  = false;
    while (!$secondPArtDone) {
        $len++;
        $res[$len] =  $arr[$n];

        $n++;
        if ($n  >= count($arr)) {
            $secondPArtDone  = true;
        }
    }
    return $res;
}
print_r(reverseFrom($a, 3));



function evenLengthSubsets($arr) {
  $result = array();
  $ans  = 0;
  for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i + 2; $j <= count($arr); $j += 2) {
      $subset = array_slice($arr, $i, $j - $i);
      if (count($subset) % 2 == 0) {
        $result[] = $subset;
        $ans  = array_sum($subset);
      }
    }
  }

  return [$result, $ans ];
}




function gridPathIn2DArr($x, $y, &$path)
{   //$x by $y grid
    /**             ======if x==1 && m ==1 return 1  one gird one path
     * gridpath(x,y)  ==
     *             ======= gridpath(x,y-1) + gridpath(x-1,y) 
     * 
     */
    if ($x === 1 || $y === 1) {
        return 1;
    }
    $path  = [...$path, [$x, $y]];
    return gridPathIn2DArr($x, $y - 1, $path) + gridPathIn2DArr($x - 1, $y, $path);
}
$path = [];
gridPathIn2DArr(3, 3, $path);
print_r($path);
// function rec($arr, $index)
// {
//     static $temp = [];
//     static $res = [];
//     if ($index  >= sizeof($arr)) {
//         return  array_push($res, $temp);
//     }
//     $temp  = [...$temp, $arr[$index]];
//     rec($arr, $index + 1);
//     array_pop($temp);
//     rec($arr, $index + 1);
//     return [$res, $temp];
// }
// print_r(rec([1, 2, 3], 0));


function ocuuntPartition($x, $y, &$path)
{   //$x by $y grid
    /**             ======if x==1 && m ==1 return 1  one gird one path
     * gridpath(x,y)  ==
     *             ======= gridpath(x,y-1) + gridpath(x-1,y) 
     * 
     */
    if ($x === 0) {
        return 0;
    }

    if ($x === 0) {
        return 0;
    }
    $path  = [...$path, [$x, $y]];
    return ocuuntPartition($x - $y, $y, $path) + ocuuntPartition($x, $y - 1, $path);
}
$path = [];
ocuuntPartition(3, 3, $path);
print_r($path);

