<?php

function findSmallestDifferencePair(array $a1, array $a2) {
    sort($a1);
    sort($a2);

    $smallestDiff = PHP_FLOAT_MAX;
    $smallestDiffPair = [];
    $i = 0; 
    $j = 0;

    while($i < count($a1) && $j < count($a2) ) {
      $currentDiff = abs($a1[$i] - $a2[$j]);
      if($currentDiff < $smallestDiff) {
        $smallestDiff = $currentDiff;
        $smallestDiffPair[0] = $a1[$i];
        $smallestDiffPair[1] = $a2[$j];
      }
      if($a1[$i] < $a2[$j]) {
        $i++;
      } else {
        $j++;
      }
    }
    print_r($smallestDiffPair);
    return $smallestDiffPair;
  }
    $a1 = [-1, 5, 10, 20, 28, 3];
    $a2 = [26, 134, 135, 15, 17];
findSmallestDifferencePair($a1,$a2);