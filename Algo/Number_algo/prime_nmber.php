<?php
$start1  = microtime();
function sieve_of_eratosthenes($n) {
  // Initialize an array to hold the integers from 2 to n.
  $primes = range(2, $n);
  
  // Loop through the array and mark the multiples of each prime number as composite.
  for ($i = 0; $i < count($primes); $i++) {
    $p = $primes[$i]; //take every nmber
    if ($p !== 0) { // number is not zero
        echo '////////////////'."\n";
      ///////////////////////////////////////////////////////////
      for ($j = $i + $p; $j < count($primes); $j += $p) {// j =2 ; j < 30 ; j +=2 i.e multiple of 2
      ///any nmber that their multiple exist is not a prime
      ///2 start from 2 then to 2,4,6,8,10...
      ///  
          echo $j.' ';
        $primes[$j] = 0;
      } 
      ////////////////////////////////////////////////////
    }
  }
  
  // Remove the composite numbers from the array, leaving only the primes.
  //$primes = array_filter($primes);
  
  return $primes;
}
$end1  = microtime()  - $start1;
print_r(sieve_of_eratosthenes(30));


$start  = microtime();
function prime($n){
   $res  = [];
  while ($n >1 ){
        $count  = 1;
      for ($i=2; $i < $n ; $i++) { //every nmber is already divided by one
            if($n% $i === 0 ){
              $count++;
            }   
      }
     if($count===1){
      $res[]  = $n;
     }  
     $n--;
  }
  return $res;
}
$end  = microtime()  - $start;

//print_r( prime(300));
echo $end."\n";
echo $end1;