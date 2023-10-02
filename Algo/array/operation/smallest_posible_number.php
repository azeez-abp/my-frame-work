<?php

///// take number 50
// [2,3,4,5,6,7,8,9]
// create a list [2=>2,3=>0,4=>1, 5=>2,6=>0,7=>0,8=>0,9=>0] 
/// number=>how many times itdivide a given number(50)
// the answer is 4,5,5 (2=>2, 4=>1 if more that one division occurs we choose the smalles one 4=>)
//$num  = 50;
function smallestPosibleNumber(int $num)
{
  $div = [];

  for ($i = 9; $i >= 2; $i--) {

    $c = 0;
    while ($num % $i === 0) {
      $num = $num / $i;
      $div[] = $i;
      if ($c === 3) break;
    }
  }
  $div  = (int)implode("", $div);
  print_r($div);
}

smallestPosibleNumber(1000);
