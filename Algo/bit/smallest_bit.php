<?php

// Count of numbers (x) smaller than or equal to n such that n+x = n^x:
// here unset bits means zero bits

// function to count number of values less than
// equal to n that satisfy the given condition
function countValues($n)
{
    // unset_bits keeps track of count of un-set
    // bits in binary representation of n
    $unset_bits = 0;
    while ($n) {
        if (($n & 1) == 0)
            $unset_bits++;
        $n = $n >> 1;
    }

    // Return 2 ^ unset_bits i.e. pow(2,count of zero bits)
    return 1 << $unset_bits;
}



// Direct XOR of all numbers from 1 to n
function computeXOR($n)
{
    if ($n % 4 == 0)
        return n;
    if ($n % 4 == 1)
        return 1;
    if ($n % 4 == 2)
        return $n + 1;
    else
        return 0;
}

// This code is contributed by Shubham Singh


function findTwoNumberFromThierSumAndXor($sum, $xor)
{
    // x  = 7     bin ==>  111 perform swaping (move down digit up and up digit down) 010
    // y  = 10     bin ==> 1010                                                       1111
    //                
    // x+y = 17 $sum
    // x^y = 13 $xor    $sum > $xor alway;
    // given 17 and 13 we should get 10 and 7 
    //
    //   
    if ($sum < $xor) {
        return null;
    } else {
        $firstPartOfTheNumber  = ($sum - $xor) / 2;

        return $firstPartOfTheNumber;
    }
}
//echo findTwoNumberFromThierSumAndXor(17,13);


function countintForEquallSumAndXor($n)
{

    $count  = 0;

    for ($i = 0; $i < $n; $i++) {
        if ($n + $i == $n ^ $i)
            $count++;
    }
    //O(n)
}

function countintForEquallSumAndXorFast($n)
{
    //O(logn)
    // unset_bits keeps track
    // of count of un-set bits
    // in binary representation
    // of n
    $unset_bits = 0;
    while ($n) {   // echo $n;
        if (($n & 1) == 0)
            $unset_bits++;
        $n = $n >> 1; ///remove one digit at a time

    }
    //echo  $unset_bits;
    // Return 2 ^ unset_bits
    return 1 << $unset_bits;
}

//echo countintForEquallSumAndXorFast(30);



function isPowerOfTwo(int $x)
{

    // it is power of two if bin(number) & bin(number -1) === 0
    return ($x != 0) && (($x & ($x - 1)) == 0);

    // if ((($x + 1) & $x) == 0)    ;  $n ^ ($n >> 1) is alternative digit 10101010
}


//echo isPowerOfTwo(6);

function swaping($a, $b)
{
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;

    echo $a . " " . $b;
}
echo swaping(5, 7);
//since exclusive disjunction is identical to addition modulo 2 


//   function allprime($n){


//      while($n >1 ){

//         	if()
//      }


//   }
echo "\n";
echo ord('A');
echo "\n";
echo chr(65);
echo "\n";
echo decbin(9);
echo "\n";
echo decbin(-9);
echo "\n";
echo 90 >> 4;
echo "\n";
echo decbin(90); // ==> 1011 /010
echo "\n";
echo bindec(1011);

echo "\n";
echo 9 << 2;  // ==>   1001  =>  1001 _ _ ==>  100100

echo bindec(100100);
