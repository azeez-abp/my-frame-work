<?php

function bubbleSort($arr)
{
    $n = sizeof($arr);

    // Traverse through all array elements
    for ($i = 0; $i < $n; $i++) {
        //echo ($n - $i - 1) . "\n";
        // n= 5 (0->4 index)
        // Last i elements are already in place
        for ($j = 0; $j < $n - $i - 1/*-1 exclude the the present eleement we are comparing*/; $j++) {
            // 0 compare 0 -> 3 index 
            // 1 compare 0 -> 2  index 
            // traverse the array from 0 to n-i-1
            // Swap if the element found is greater
            // than the next element
            if ($arr[$j] > $arr[$j + 1]) {
                $t = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $t;
            }
        }
    }
    print_r($arr);
}
$arr  = array(5, 1, 4, 2, 8);

bubbleSort($arr);

function bubbleSort($array) {
  $n = count($array);
  for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
     /////////////////////////////////////////    
      if ($array[$j] > $array[$j + 1]) {
        // Swap the elements
        $temp = $array[$j];
        $array[$j] = $array[$j + 1];
        $array[$j + 1] = $temp;
      }
     /////////////////////////////////////////
    }
  }
  return $array;
}


