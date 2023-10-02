<?php

function twoSumOptimized($array, $target) {
  $map = [];
  $res  = [];
  $n = count($array);
  for ($i = 0; $i < $n; $i++) {
    $complement = $target - $array[$i];
    if (isset($map[$complement])) {
      $res  = [...$res ,[$map[$complement], $i]];
    }
    $map[$array[$i]] = $i;
  }

  return $res;
}

print_r(twoSumOptimized([21,22,3,4,5,6,6,11,6,7,77,-1],12));
 
/*This implementation uses a hash map to store the values and their indices as it iterates through the array. For each value in the array, it calculates the complement, which is the value needed to add up to the target, and checks if the complement is already in the hash map. If the complement is found, the indices of the current value and the complement are returned. If the complement is not found, the current value and its index are added to the hash map.
[5,6,-7] 11  
This optimized implementation has a time complexity of O(n), which is more efficient than the O(n^2) time complexity of the previous implementation, especially for large arrays.
=======>step 1
 ans = 11 - 5 => 6  , is 6 in map => if yes ,res [indexofans, currentindex] [0,0]  in result and [elem=>index] in map  ie 
 [5=>0]
=======>step 1

=======>step 2
 ans = 11 - 6 => 5  , is 5 in map => if yes [indexofans, currentindex] [0,1] in result else [ans=>index] in map  ie [6=>1]
=======>step 2

=======>step 3
 ans = 11 - -7 => 18  , is 18 in map => if yes [indexofans, currentindex][-,2] in result else [ans=>index] in map  ie [-7=>2]
=======>step 3




*/


