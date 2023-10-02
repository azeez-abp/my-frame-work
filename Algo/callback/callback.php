<?php
/////////////////////use for 

$callbackReturn_1  = function ($func) {

    return function ($args) use ($func) { /// a function with argument. explicit arg , 
        return  call_user_func($func, $args);
    };
};

$funct1  = function ($n) {
    return $n;
};
echo $callbackReturn_1($funct1)(50);

///////////////////////////////////////////////////////////


$callbackReturn_1  = function ($func) {

    return function () use ($func) { /// a function with argument. implicit arg , 
        $args  = func_get_args();
        return  call_user_func($func,  $args);
    };
};

function one($n)
{
    return $n;
}
print_r($callbackReturn_1('one')(50));
//////////////////////////////////////////////////////////////

$callbackReturn_1  = function ($class, $method) {

    return function () use ($class, $method) { /// a function with argument. implicit arg , 
        $args  = func_get_args();
        return  call_user_func_array([$class, $method],  $args);
    };
};

$user = new class
{

    function getData($id)
    {
        return $id;
    }
};

print_r($callbackReturn_1($user, 'getData')(500));

//////////////////////////////////////////////////////////


$factory_function  = function () {
    return new class
    {
    };
};
////////////////////////////////////////////////

$useMemo  = function ($funct) {

    return function () use ($funct) {
        $args  = func_get_args();
        $key   = md5(serialize($args));
        static $cache  = [];
        if (isset($cache[$key])) {
            return $cache[$key];
        }
        $cache[$key]  =   call_user_func($funct, count($args) === 1 ? $args[0] : $args);
        return $cache[$key];
    };
};

function fib($num)
{
    return ($num <= 2) ? $num : fib($num - 1) + fib($num - 2);
}
function fibMemo($num)
{
    static $cache  = []; // what do we to cache
    return (isset($cache[$num]))  ? $cache[$num] : ($num < 2  ? $num : ($cache[$num] = fibMemo($num - 1) + fibMemo($num - 2)));
}
echo "\n";
$s  = microtime(true);
echo fibMemo(200);
echo "\n";
$e  = microtime(true);
echo $e - $s;
echo "\n";

$s  = microtime(true);
$fibMem0   = $useMemo('fib');
//echo $fibMem0(50);
$e  = microtime(true);
echo "\n";
echo $e - $s;


function callOnce($func)
{

    return function () use ($func) {
        static $hassCall  = false; ///static key word wll not allow the value of change
        if (!$hassCall) {
            $param   = func_get_args();
            call_user_func($func, $param);
            $hassCall  = true;
        } else {
            $func = null;
        }
    };
}


function classCall($who)
{
    print_r(['name' => $who]);
}

$callOnce  = callOnce('classCall');

$callOnce('azeez');
$callOnce('abeeb');
$callOnce('gani');
