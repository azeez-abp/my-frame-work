<?php
/*
Sure, I'd be happy to explain how a recursive function runs.

A recursive function is a function that calls itself. When a recursive function is called, it executes the code inside the function until it reaches a base case. The base case is a condition that determines when the function should stop calling itself and return a value.

When the base case is not met, the function calls itself again with a modified input. Each recursive call creates a new instance of the function with its own set of variables and execution context.

As each instance of the function is executed, the program creates a stack of function calls, with the most recent call at the top of the stack. When a function completes its execution, it is popped off the stack, and the program returns to the previous function call on the stack.

Here's a simple example of a recursive function in PHP:

php
Copy code
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo factorial(5); // Outputs 120
This function calculates the factorial of a number using recursion. The base case is when $n <= 1, at which point the function returns 1. If the base case is not met, the function calls itself with $n - 1 as the argument and multiplies the result by $n.

Here's a breakdown of how the function runs when we call factorial(5):

The function is called with $n = 5.
Since $n > 1, the function calls itself with $n - 1 = 4.
The new instance of the function is called with $n = 4.
Since $n > 1, the function calls itself with $n - 1 = 3.
The new instance of the function is called with $n = 3.
Since $n > 1, the function calls itself with $n - 1 = 2.
The new instance of the function is called with $n = 2.
Since $n > 1, the function calls itself with $n - 1 = 1.
The new instance of the function is called with $n = 1.
Since $n <= 1, the function returns 1.
The previous instance of the function multiplies 1 by 2 and returns 2.
The previous instance of the function multiplies 2 by 3 and returns 6.
The previous instance of the function multiplies 6 by 4 and returns 24.
The original instance of the function multiplies 24 by 5 and returns 120.
So, as you can see, each instance of the function is pushed onto the stack, and when the base case is reached, each instance is popped off the stack and returns its result to the previous instance until the original function call is completed.

/////////////////////////////////////////////////////////////////////////////////////////
  
    Also note in a recursion function, there are are two space: function call before recursion and function call after recursion

    if we want a recursion to repeat after done, we will place a condition before it that will make it do that

    What is the recursive leap of faith?- Simply put, we assume that our recursive call will work exactly as it’s supposed to.
    recursive problems can be solved by splitting the problem into base cases and the recursive steps. Leap of faith covers the latter.

    work out the base cases. Once we have created them, we take the recursive cases, and then call our recursive function with updated parameters. 
    The leap of faith method is the assumption that the method/function we’re in the middle of writing already works

    So if we are creating a recursive call on a graph, we will assume that the function already works for the subgraph.

/////////////////////////////////////////////////////////////////////////////////////



*/
function reverseStr($str)
{
    if ($str === '') {
        return $str;
    }
    echo substr($str, 0, 1) . "\n";
    return  reverseStr(ltrim($str, substr($str, 0, 1))) . substr($str, 0, 1);
}

function factorial(int $n)
{
    if ($n == 0) return 1;
    return $n * factorial($n - 1);
}
function reverseStr2($str)
{
    if ($str === '') {
        return $str;
    }
    $remainStr  = ltrim($str, substr($str, 0, 1)); // reomove form str the last lettet
    //$l  =  substr($str, 0, 1) . reverseStr($remainStr); //call the funtion
    $l  =   reverseStr($remainStr) . substr($str, 0, 1); //call the funtion
    return  $l; // return the loop
}
echo reverseStr2("Abraham");
function isPalindrome($str)
{

    if (strlen($str) == 1 || strlen($str) == 0) {
        // echo 'yes';
        return true;
    }

    if (substr($str, strlen($str) - 1, 1)/*last letter*/ ===  substr($str, 0, 1)  /*first letter*/) {
        //ltrim remove 
        return isPalindrome(rtrim(ltrim($str, substr($str, 0, 1)), substr($str, strlen($str) - 1, 1)));
    }

    return false;
}

function isPalindrome2($str)
{

    $start = 0;
    $end = strlen($str) - 1;
    $ispali  = false;
    while ($start < $end) {
        if ($str[$start] === $str[$end]) {
            $start++;
            $end--;
            $ispali  = true;
        } else {
            $ispali  = false;
            break;
        }
    }
    if ($ispali) {
        echo " $str  $start $end is isPalindrome";
    } else {
        echo " Not  isPalindrome ";
    }
    return   $ispali;
}



function chunkByN($arr, $num, $res = [])
{
    count($arr);
    if (count($arr) <= 0) {
        echo "YES";
        return $res;
    }
    $chk  = [];
    for ($i = 0; $i < $num; $i++) {
        if (array_key_exists($i, $arr)) $chk[$i] = $arr[$i];
    }
    if (count($chk) === $num) array_push($res, $chk);
    array_shift($arr);
    return chunkByN($arr, $num, $res);
}

print_r(chunkByN([1, 2, 3, 4, 5, 6], 4));

//echo isPalindrome('madam');
//echo reverseStr("abcd");
//offset: away. not part of
// $a  = [1, 2, 3];
// print_r(array_shift($a));
// print_r($a);
// $str = "abcd";
// echo rtrim(ltrim($str, substr($str, 0, 1)), substr($str, strlen($str) - 1, 1)) . "\n";
// echo (substr($str, strlen($str) - 1, 1)) . "\n"; // neglect 3 char take one
// echo (substr($str, 0, 1));///offset 0 neglect 0 char
//echo (ltrim("abcd", substr("abcd", 0, -2)));
//echo (chop("abcd a", 'a'));work for letter separation or word separation


$funct  = function ($functs) {
    $args = func_get_args();
    print_r($args);
    return $functs();
};
$name = "AZEEZ";
$say = function () use ($name) {
    echo $name;
};
//var_dump($funct);
$funct($say);



////my solution more efficient that the above


function fibMemo($n)
{

    static $cache = [];
    //print_r($cache);
    if (!empty($cache[$n])) {
        return $cache[$n];
    } else {
        if ($n < 2) {
            return $n;
        } else {
            $p   = fibMemo($n - 1) + fibMemo($n - 2);
            $cache[$n]  = $p;
            return $p;
        }
    }
}
echo fibMemo(250);

function prePrint($n)
{
    if ($n == 0) {
        return;
    }
    //echo $n; ///54321
    prePrint($n - 1); ////substract first
    echo $n; //12345///then pass
    //////////////////////////////////Echo after is reverse
}
// /prePrint(5);

function countNumberOfDigit($n, $digit_to_count, $c = 0)
{

    if ($n == 0) {
        return $c;
    } else {
        $rem  = $n % 10; //last digit
        $num_left  = floor($n / 10); // remaining number
        if ($rem === $digit_to_count) {
            return countNumberOfDigit($num_left, $digit_to_count, $c + 1);
        } else {
            return countNumberOfDigit($num_left, $digit_to_count, $c);
        }
    }
}
echo countNumberOfDigit(123353350, 0); //count number of zero in the number


function countStep($n, $s = 0)
{

    if ($n < 1) {
        return $s;
    } else {

        if ($n % 2 == 0) {
            $n  = $n / 2;
        } else {
            $n  = $n - 1;
        }
        return countStep($n, $s + 1);
    }
}

echo countStep(41);


isPalindrome2("dad");



$memoize = function ($func) {
    return function () use ($func) {
        static $cache = [];
        $args = func_get_args();
        $key = md5(serialize($args));
        if (!isset($cache[$key])) {
            $cache[$key] = call_user_func_array($func, $args);
        }
        return $cache[$key];
    };
};

$fibonacci = $memoize(function ($n) use (&$fibonacci) {
    return ($n < 2) ? $n : $fibonacci($n - 1) + $fibonacci($n - 2);
});
try {
    echo $fibonacci(20);   //code...
} catch (\Throwable $th) {
    //throw $th;
    print_r($th->getMessage());
}
