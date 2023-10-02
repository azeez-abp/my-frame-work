<?php
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
ispalind(2552);


function checkisPerectNumber($num)
{
    /*number is perfect is sum of it factor is the number*/
    $sum  = 0;
    for ($i = 1; $i < $num; $i++) {

        if ($num % $i === 0) {

            $sum  +=  $i;
        }
    }
    echo "\n" . $sum . "\n";
    if ($sum === $num) echo "$num IS PERFECT";
}
checkisPerectNumber(6);
// for ($i = 0; $i < 100; $i++) {
//     echo " " . $i;
//     checkisPerectNumber($i);  # code...
// }


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




strong_number(145);
