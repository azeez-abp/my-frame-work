<?php


function factorial($n)
{
    return $n === 1 ? $n : $n * factorial($n - 1);
}

//echo factorial(6);

///////////////////////////Algebra of recursion

function recurAlgebra($n, $tot = 0)
{
    static $res = [];
    if ($n <= 0) return $n;
    ////pushing in recursin
    $res[]  = $n;
    recurAlgebra($n - 1, $tot + 1); ////  filling the stack untill condition reach
    ///poping in backtrack
    unset($res[count($res) - 1]);
}
echo recurAlgebra(4);


function permutation($arr, $pos, $selection, &$ans)
{
    static $each = [];
    if ($pos === count($arr)) {
        $ans[]  = $each;
        $each  = [];

        return null;
    }
    for ($i = 0; $i < count($arr); $i++) {
        if ($selection[$i] === 0) {
            $selection[$i] = 1;
            $each[]  = $arr[$i];
            permutation($arr, $pos + 1, $selection, $ans);
            $selection[$i] = 0;
        }
    }
}
$a  = ['a', 'b', 'c'];
$selection  = array_fill(0, count($a), 0);
$ans  = [];
permutation($a, 0, $selection, $ans);

print_r($ans);

// function permutation2($arr)
// {
// }
// permutation2($a);
