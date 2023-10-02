<?php
function reverseStr($word){
   ///convert the str to array
   $ar  = str_split($word);
   $p1  = 0;
   $p2  = count($ar)-1;
   $res  = '';
      while($p1 <= $p2){
         echo $p2;
        $res .=$ar[$p2--];
     }
     //$res .=$ar[$p1];
    echo "\n".$res; 


}  
reverseStr('Azeez');
reverseStr('byallo');