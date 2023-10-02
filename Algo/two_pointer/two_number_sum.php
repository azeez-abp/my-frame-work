<?php

function twoNumberSum($arr,$taget){
   sort($arr);
  print_r($arr);
   $p1  = 0;//pointer 1 lower pointer
   $p2  =count($arr)-1;//higher pointer
   $res =[];  

   while($p1 < $p2){
      $value  = $arr[$p1]+$arr[$p2];
      if($value==$taget){
        array_push($res, [$arr[$p1],$arr[$p2]]);
         $p1++;
      }else{
       $p2--;
      }

     
   } 

   print_r($res);
}


twoNumberSum([2, 7, 11, 15,5,4,6,3],9);