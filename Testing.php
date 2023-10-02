<?php

// $foo  = 'foo';

// echo $$foo;


// const A = 'ertyuiop';
// echo A;
$p  = 3;
$p   %= 6;
//echo  $p ;

//  $X  = '';
// for ($x=0; $x < 6; $x++) { 
//       $X .='x';
//       echo "{$X}\n";
//       $Y =  '';
//      for ($y=0; $y < 6; $y++) { 
//            $Y  .= 'y';
//            echo "{$Y}\n";
//            $Z  = '';
//              for ($z=0; $z < 6; $z++) { 
//                  $Z  .= 'z';
//                       echo "{$Z}\n";


//              }


//      }

// }


function is_perfect_number(int $number): bool
{
    // from
    //except the number
    // sum of the factor is the number
    $sum_of_factor = 0;
    for ($i = 1; $i < $number; $i++) {
        if ($number % $i === 0) $sum_of_factor += $i;
    }
    //echo $sum_of_factor;
    if ($sum_of_factor === $number)  return true;
    return false;
}
// $y  =  is_perfect_number(9)?"PERFECT":"Not PERFECT";
// echo $y;
function basic_fibnacci($number)
{
    $a   = 0;
    $b   =  1;
    $next  = 0;
    for ($i = 1; $i < $number; $i++) {
        $next  = $a + $b;
        $a = $b;
        $b = $next;
        //[] 
        echo $next . "\n";
    }
}
//basic_fibnacci(1000)

function is_palindrome($number)
{
    $sum   = 0;
    $base_power  = -1;
    $tmp = $number;
    while ($number > 0) {
        $base_power++;
        $last_digit = $number % 10; //==>remaider
        $remain = $number / 10;
        echo  $last_digit . "\n";

        $number = floor($remain);
        $sum =  $sum * 10 + $last_digit;
        //replacement of sum not cummlative
        echo $sum . "\n";
    }



    if ($sum === $tmp) echo " yes";
    //  $number  = -3;
}
//is_palindrome(393);



$is_prime_number  = function ($number) {

    ///spread out the numebr
    ////check all factor'
    $nuberCount = 0;
    for ($i = 1; $i <= $number; $i++) {

        if ($number % $i === 0) {
            $nuberCount++;
        }
    }
    if ($nuberCount === 2) {
        return true;
    }

    return false;
};
$is_prime_number(7);


$r  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 123, 12];

$b  =  array_filter($r, $is_prime_number);
print_r($b);


$is_strong_number  = function ($number) {
    ////spread the number 
    ////sum of the factorial of the munber == the numebr then is strong

    while ($number > 0) {
        for ($i = 1; $i <= $number; $i++) {

            //continue mean skip
        }
    }
};

//////////////////one expression is temnated by semicolon

function one(...$param)
{
}

function two()
{

    one('sdsdsd', 'dfsdss', 'sdds');
}
two();



?>


<?php
//credits()
/*

  https://www.objectivequiz.com/objective-questions/programming-technologies/laravel

https://theproli.com/getapp/banner/banner.png
https://www.youtube.com/watch?v=LaHwCRYTtf8
*/

$index_of_hope  = array_search('Hope', ['me', 'do', 'hope']);
print_r($index_of_hope);
///array_diff ==> returm what is in first array and not in second array

$dif    = array_diff([1, 2, 3, 4, 44], [1, 22, 3, 4, 44]);
print_r($dif);
$a = [1, 2, 3, 4, 44];


array_walk($a, function ($ele) {
    $t  = "element {$ele} is prensent ";
    echo $t . "\n";
    sprintf($t, $ele);
});


function generator($a, $b)
{

    for ($i = $a; $i < $b; $i++) {
        yield $i;
        //yield return class Generator class
    }
}

//$generator  = generator(1,3_000_000);

$generator  = generator(10, 2_000);


echo  $generator->current();
echo  $generator->next();
/////////////////////////////////
echo  $generator->current();
echo  $generator->next();
///////////////////////////////
// foreach ($generator  as $val){
//    echo $val . " \n ";
// }


function weakMapDemo()
{

    class Object1
    {
        public function __construct()
        {
            echo "\n";
            print_r(__CLASS__ . " Call constructor");
            echo "\n";
        }
    }

    ////////////////////////////
    $object1  = new Object1();
    $weakStore  = new WeakMap();
    $strongStore  = new SplObjectStorage();

    $weakStore[$object1] = ['weak' => 'a store'];

    $strongStore[$object1] = ['stronge' => 'a store'];


    //////////////////////////////////////////////
    echo count($weakStore) . "\n";
    unset($weakStore[$object1]);
    echo count($weakStore) . "\n";;

    ////////////////////////////////////////////////



    //////////////////////////////////////////////
    echo count($strongStore) . "\n";;
    unset($strongStore[$object1]);
    echo count($strongStore) . "\n";;

    ////////////////////////////////////////////////

}

weakMapDemo();

enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}


//var_dump(Suit::enum);
print Suit::Clubs->value;

/*Data Structures and Algorithms
Sorting Algorithms
Recursion and Backtracking
Strings
Trees and Its Variants
Linked Lists, Stacks, and Queues
Greedy Algorithms
Dynamic Programming
Object Modeling / API Design*/
function testStatic()
{


    class App
    {

        public static function __callStatic($name_of_method, $arg)
        {
            var_dump($name);
        }
    }

    $app   = new App();

    $app->anyMethod();
}

function printTable()
{
    //principle table is 2d array

    for ($x = 0; $x < 10; $x++) {

        for ($y = 0; $y < 5; $y++) {
            echo "||" . "";
            echo "============================";
        }
        echo "||" . "\t";
        echo "\n";
    }
}
echo "\n";
//printTable();






function stackListDemo()
{

    class Skack implements Iterator
    {
        public function __construct(array $item)
        {
        }
    }
}


function arrayOfNDept($number)
{

    static $a  = [];
    $b  = null;
    $c  = null;

    $b[]  = $a;
    $c[]  = $b;

    $a  = $b;
    $b  = $c;

    $c   = $a;
    // $a==>$b==>$c==>$a,$b

    print_r($c);;
    if ($number == 0) {
        //return $a;
        echo "===========================================";
        print_r($c);
        echo "===========================================";
    } else {


        arrayOfNDept($number - 1);
    }
}


//arrayOfNDept(10);

function flattenNDeptArray(array $array)
{
    static $store = 0;
    static $storeArray  = [];
    echo count($array);
    if (count($array) == 0) {

        echo $store;
        return $store;
    } else {
        //principle of more to less
        $child  = $array[0];
        $array  = $child;
        $store += 1;
        // $store;
        flattenNDeptArray($array);
    }
}


//flattenNDeptArray([[[[[[]]]]]]);


function superSet($array)
{
}



#GRANT ALL ON demo_db .* TO 'azeez'@'%' IDENTIFIED BY 'your_laravel_db_password';


function isValidStr($s)
{
    $arr  = str_split($s);
    $rights  =  array_slice($arr, 0, count($arr) / 2);
    $lefts  =   array_reverse(array_slice($arr,  count($arr) / 2, count($arr)));
    $item_pair  = ['{' => '}', '(' => ')', '[' => ']'];

    if (count($rights) !== count($lefts)) {
        return 'Missing brace';
    }

    foreach ($rights as $index => $right) {
        if ($item_pair[$right] !== $lefts[$index]) {
            return "Expecting {$item_pair[$right]} but got {$lefts[$index]} on postion {$index} ";
        }
    }

    return "Valid close";
}



function findLength(array $nums, int $k)
{
    //sliding window
    $left = 0;
    $curr = 0;
    $ans = 0;

    for ($right = 0; $right < count($nums); $right++) {
        $curr += $nums[$right];
        while ($curr > $k) {
            $curr -= $nums[$left];
            $left++;
        }

        $ans = max($ans, $right - $left + 1);
        //Math.max(ans, right - left + 1);
    }

    return $ans;
}
//echo findLength([3, 1, 2, 7, 4, 2, 1, 1, 5],8);
function subBy4($array)
{
    $res  = [];

    for ($i = 0; $i < count($array); $i++) {
        $count   =  0;
        $sub  = [];
        while ($count < 4) {
            $ele  = $array[$count];
            array_push($sub, $ele);
            $count++;
        }
        unset($array[0]);
        $array  =  array_values($array);
        print_r($array);
        array_push($res, $sub);
    }

    print_r($res);
}

function subSet($array)
{

    $bit;
    $max_bits;  // max bits for number i
    $size  = count($array);
    $end  = pow(2, $size); //subset   = 2*n

    $res = [];
    for ($i = 0; $i < $end; $i++) { //
        printf("{ ");
        $each_set  = [];
        $max_bits = floor(log($i, 2)); // the number of times 2 will divide $i    //is the number of the times the next loop will read
        //echo $max_bits . " bit\n";
        for ($j = 0; $j <= $max_bits; $j++) {
            $bit = ($i >> $j) & 1;  // bit value at position j /// divide $i by 2 in $j times 
            if ($bit == 1) {
                $each_set = [...$each_set, $array[$j]];
                printf("%s ", $array[$j]);  // one-based array, add 1
            }
        }
        $res  = [...$res, $each_set];
        printf("}\n");
    }
    print_r($res);
    echo  $end;
    return 0;
}

subSet([1, 2, 3, 4, 5]);




function permutation()
{
    function permute($array, $start, $end, &$result)
    {
        if ($start === $end) {
            $result[] = $array;
        } else {
            for ($i = $start; $i <= $end; $i++) {
                $array = swap($array, $start, $i);
                permute($array, $start + 1, $end, $result);
                $array = swap($array, $start, $i); // backtrack
            }
        }
    }

    function swap($array, $i, $j)
    {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
        return $array;
    }

    function getPermutations($array)
    {
        $result = [];
        $length = count($array);
        permute($array, 0, $length - 1, $result);
        return $result;
    }

    // Usage example:
    $numbers = [1, 2, 3];
    $permutations = getPermutations($numbers);

    // Output the permutations
    foreach ($permutations as $permutation) {
        echo implode(', ', $permutation) . PHP_EOL;
    }
}
permutation();
//https://www.interviewbit.com/laravel-interview-questions/#laravel-mcqs
//
//
//https://snaphunt.com/
//https://rappasoft.com/quizzes/laravel/e82c336f-6782-4bcb-8525-4d7779b891b7/random?question=e8aeff50-e02f-4e79-b755-05449f54fbdd
//https://www.youtube.com/watch?v=zm9bqSSiIdo&list=PL7wAPgl1JVvUEb0dIygHzO4698tmcwLk9 coding math
//https://refactoring.guru/design-patterns/catalog
//https://www.youtube.com/watch?v=9XnsOpjclUg&list=PLF206E906175C7E07&index=11
//https://leetcode.com/explore/interview/card/leetcodes-interview-crash-course-data-structures-and-algorithms/703/arraystrings/4502/
?>
