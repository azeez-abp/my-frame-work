<?php
function threeNumberSum($arr,$taget){
   sort($arr);
  print_r($arr);
    $res =[];
  for ($i=0; $i < count($arr) ; $i++) { 
     // code...
  
   $p1  = $i+1;//pointer 1 lower pointer
   $p2  =count($arr)-1;//higher pointer
   
 echo "===========";
   while($p1 < $p2){
      $value  = $arr[$i]+$arr[$p1]+$arr[$p2];
      echo $value." {$taget}\n";
      if($value == $taget){
        array_push($res, [$arr[$i],$arr[$p1],$arr[$p2]]);
         $p1++;
          $p2--;
      }else if($value < $taget)

       {
       $p1++;
      }else{
         $p2--;
      }

     
   }
    echo "===========";
}

   print_r($res);
}


threeNumberSum([7, 12, 3, 1, 2, -6, 5, -8, 6],0);