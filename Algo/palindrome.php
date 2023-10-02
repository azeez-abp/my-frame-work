<?php
function isPalindrome($str)
{
    $l  = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $str));
    $start  = 0;
    $end    = strlen($l);
    echo $l;
    while ($start <= $end) {
        if ($l[$start] !== $l[$end - 1]) {
            return false;
        }
        $start++;
        $end--;
    }
    return  true;
}

echo isPalindrome('ab_a');



function isPalindrome2($str, $start, $end)
{

    if ($start >= $end) {
        return true;
    }

    if ($str[$start] !== $str[$end]) {
        return false;
    } else {
        isPalindrome2($str, $start + 1, $end - 1);
    }

    return true;
}

function callPalin($str)
{
    $l  = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", trim($str)));

    $end  = strlen($l) - 1;
    $start = 0;

    return  isPalindrome2($l, $start, $end);
}
echo callPalin('Madam Madam ');


function ispaline($str)
{
    $str    = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", trim($str)));
    return strrev($str) === $str;
}
echo ispaline("racecar");
echo ispaline("Desnes not far, Rafton Sensed");
echo ispaline("Do Geese see God");
echo ispaline("Was it a car, or a cat, I saw");      