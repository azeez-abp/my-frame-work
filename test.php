<?php



function rev_arr($arr)
{
    $len  = count($arr) - 1;
    $start  = 0;
    while ($len > -1) {
        $end   = count($arr) - 1;
        while ($start != $end) {
            $tmp = $arr[$end];
            $arr[$end]   = $arr[$end - 1];
            $arr[$end - 1]  =  $tmp;
            $end--;
        }
        $start++;
        $len--;
    }


    print_r($arr);
}
rev_arr([-1, 2, 3, -4, 5]);



//declare(strict_types=1);
$h    = "HOPE VAR";
$str = <<<TXT
is double qoute string Heredoc
rfejrehroere $h
erererererre
erere

TXT;

echo $str;


$str2 = <<<'TXT'
is single qoute string Newdoc
rfejrehroere $h
erererererre
erere

TXT;
echo $str2;

///@ error control operartor
///& reference operator

/////named argument in function


function cal(float $numOne,  int $numTwo): float
{
    $res  = $numTwo + $numTwo;
    return $res;
}


echo cal(56.89, 23);

//print_r($_REQUEST);


$resp  = array_map(fn ($val) => $val * 3, [12, 3, 665, 5, 5, 4]);

//print_r($resp);

function getMaxNumber($num, $want)
{
    $max = -INF;
    $min = INF;
    foreach ($num as $key => $value) {

        if ($value > $max) {

            $max = $value;
            //echo $max."\n";
            //$max = $smallestNUmber;
        }

        if ($value < $min) {

            $min = $value;
            // echo $mib."\n";
            //$max = $smallestNUmber;
        }
    }
    return  $want == 'min' ? "\n" . $min : "\n" . $max;
}

print(getMaxNumber([12, 3, 665, 5000, 5, -1], 'max'));
echo "\n";
function formatBytes($bytes, $precision = 2)
{
    $units = array("b", "kb", "mb", "gb", "tb"); ///get the memory consume by the array

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow)); //<< shifting operation

    return round($bytes, $precision) . " " . $units[$pow];
}

print formatBytes(memory_get_peak_usage());
//echo  memory_get_peak_usage();
function shiftingOperator()
{
    /*  
      <<  is multiplication by 2
      >>  is divided by 2
      6 << 3  i.e  multiply  6 by 2 three times 6*2*2*2  = 48
      3 << 6  1.e  multiply  3 by 2 six times 3*2*2*2*2*2*2  = 192  
      3 >> 6  1.e  divide  3 by 2 six times 3/2/2/2/2/2/2/2  = 192  
     
	*/
    echo "\n jb " . (6 << 3) . "\n"; //
    echo "\n jb " . (3 >> 6) . "\n"; //
    echo "\n jb " . (40 >> 3) . "\n"; // 40/2/2/2
    //echo instanceof 3;
    //shell command operator

}
shiftingOperator();


function sendData($url, $callback)
{
    $err = '';
    $data;

    if (empty($url)) {
        $err  = "Url is required";
        return void;
    }

    $data  = ['nama' => ' abe'];
    $callback($err, $data);
}


sendData('me.block', function ($err, $data) {
    if ($err) {
        echo $err;
    }

    print_r($data);
});

$nums  = [2, 3, 45, 5];
$glbVar = 4;
$new   = array_map(fn ($num) => $num + $glbVar, $nums); //arrow function// no use of use key word to access global variable 
print_r($new);
date_default_timezone_set('africa/lagos');
echo date('d-F-Y g:ia', time());

$arr_   = [
    ['p' => 23, 'q' => 20],
    ['p' => 230, 'q' => 5],
    ['p' => 103, 'q' => 9]

];

$initial_val = 0;
$tot  = array_reduce($arr_, fn ($prev, $current) => $prev + ($current['p'] * $current['q']), $initial_val);
echo "\n total sales price " . $tot;

$walk  = array_walk_recursive($arr_, fn ($nu) => $nu);

usort($arr_, fn ($first, $sec) => $first['p'] > $sec['p']);
//print_r($arr_);

var_dump(array(true => 'a', 1 => 'b'));

//$i  = 0; for($i){ print $i;}
echo substr_replace('apple', 'x', 1, 2);

do {
    print "hi";
} while (0);
print "hello";

//func_num_args()

function groupByOwners(array $files): array
{

    $res  = [];
    $array_key   = [];
    $array_value  = [];

    foreach ($files as $key => $v) {
        if (!in_array($v, $array_key)) {
            array_push($array_key, $v);
        }
    }

    $allV = [];
    for ($i = 0; $i < count($array_key); $i++) {
        $va = [];
        foreach ($files as $key => $v) {
            if ($v  === $array_key[$i]) {

                array_push($va, $key);
            }
        }
        array_push($allV, $va);
    }
    $out  = array_combine($array_key, $allV);




    return  $out;
}

$files = array(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
//var_dump(groupByOwners($files));








class TextInput
{
    protected  $textV;
    public function __construct()
    {
        $this->textV  = '';
    }


    public function add($text)
    {
        $this->textV .= $text;
    }

    public function getValue()
    {
        return $this->textV;
    }
}

class NumericInput extends TextInput
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($text)
    {
        if (is_numeric($text)) {
            $this->textV .= $text;
        }
    }
}


// $input = new NumericInput();
// $input->add('1');
// $input->add('a');
// $input->add('0');
// echo $input->getValue();
// var_dump(get_class_methods(new NumericInput()));
// var_dump(new NumericInput());
/*
JavaScript variables, data types, functions, scope, keywords, loops, hoisting, etc.

No of Questions: 20
Level: Easy
https://www.tutorialsteacher.com/online-test/javascript-test1
*/


function ispalind(int $num)
{
    $sum  = 0;

    while ($num > 0) {
        $rem    = $num % 10;
        $sum  = $sum * 10 + $rem;
        $num    = floor($num / 10);
    }
    echo $sum . "\rtyui";
}
//ispalind(2552);

function strong_number($number)
{
    function  fact($n)
    {
        if ($n === 1) {
            return $n;
        }
        return $n * fact($n - 1);
    }

    /**
     * find the factorual of each digit
     * add it together
     * if the result === number the number is strog
     */
    $tmp  = $number;
    $total  = 0;
    while ($number > 0) {
        $ld  = $number % 10;
        $number  = floor($number / 10);
        $total += fact($ld);
    }
    echo "total is $total and  number is $number";
    if ($total ===    $tmp) {
        echo "$number is a strong number";
    }
}




//strong_number(145);




function closureOptimizeCodeRunTime()
{
    $arr   = [];
    $ans = null;
    for ($i = 0; $i < 100000; $i++) {
        $ans  = $i * $i;
        $arr[]  = $ans;
    }
    // return $arr;  this take 4.2 ms
    ///to optimeze return the output in a closure fucntion function rather tah returning the outpu diretly
    return function () use ($arr) { //this take 0.4ms
        return $arr;
    };
}

// $init  = microtime(true);
// print_r(closureOptimizeCodeRunTime()());
// $final  = microtime(true);
// echo $final - $init;




echo ord('A');
echo  ord('a');
// diffence between uppercase and lowercase is 37

function addOne(&$value, $key)
{
    echo $key . "\n";
    $value += 1;
}

$numbers = [1, 2, 3, 4, 5];
array_walk($numbers, 'addOne');

print_r($numbers);

echo "fe";

class Abe
{
    protected static $name = "Abey";

    public function getName(): string
    {
        /**
         * static can access static props form none static properties
         */
        return static::$name;
    }
}

class Abe2 extends Abe
{
    protected static $name = "Abey2";
}

$a  = new Abe();
$a2  = new Abe2();
echo $a->getName();
echo $a2->getName();
