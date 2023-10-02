<?php


function expression($exp)
{
    $stack = [];
    $out = "";
    $operators = array(
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2,
        '^' => 3
    );

    for ($pointer = 0, $len = strlen($exp); $pointer < $len; $pointer++) {
        $cur = $exp[$pointer];

        if ($cur === '(') {
            $stack[] = $cur;
        } elseif ($cur === ')') {
            while (($last = array_pop($stack)) !== '(') {
                $out .= $last;
            }
        } elseif (isset($operators[$cur])) {
            while (
                !empty($stack) &&
                end($stack) !== '(' &&
                $operators[end($stack)] >= $operators[$cur]
            ) {
                $out .= array_pop($stack);
            }
            $stack[] = $cur;
        } else {
            $out .= $cur;
        }
    }

    while (!empty($stack)) {
        $last = array_pop($stack);
        if ($last !== "(") {
            $out .= $last;
        }
    }

    return $out;
}


echo expression('2*(3+4)');
echo "\n";
echo expression('3+4*2/(1-5)^2');
//3 + 4 * 2 / (1 - 5)^2
//3 4 2 1 5 - ^ / *
