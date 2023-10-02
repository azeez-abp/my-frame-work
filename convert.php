<?php

function convertTobase($num, $base)
{

        $ans = '';
        $rems = [];

        do {
                $rem = $num % $base;
                $ans = (string)$rem . $ans;
                $num /= $base;
                $num = (int)$num;
        } while ($num >= $base);

        $ans = (string) $num . $ans;
        echo  $ans . "\n";
}


convertTobase(234, 2);
//convertTobase(72, 6);
//convertTobase(128, 6);+
// convertTobase(125, 5);































function speak($s)
{

        $out = '';
        for ($i = 0; $i < strlen($s); $i++) {
                $asc = ord($s[$i]);
                $out .= decbin($asc) . " ";
                if (($i + 1) % 4 == 0) $out .= "\n";
        }

        try {
                $f  =  fopen(__dir__ . "\\rbin.txt", 'w');
                fwrite($f, $out);
                fclose($f);
        } catch (Exception $e) {
                print_r($e);
        }
}

//speak($s);


speak('I love you');
