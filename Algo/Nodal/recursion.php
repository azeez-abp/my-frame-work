<?php
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