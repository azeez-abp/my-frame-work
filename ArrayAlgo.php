<?php

// class DynamicArray{
 
//    $size;
   
   

// }
preg_match(pattern, subject)

/////////////////////////////////////////////////////////////////////
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    /////////////////
    function sortedSquares($nums) {
          $new  = [];
         foreach($nums as $num){
             $num  = $num**2;
             array_push($new,$num);  
         }
        sort($new);
        return $new;
    }

    /////////////
   

  function mergeSort2(&$nums1, $m, $nums2, $n){
   //three pointer tech
   //$i is pointer that start from total length $m+$n-1 and move down $i-- until is in first index 0;
   //$a is a pointer that start from end of the lenght of first array $m-1 moving down to zero
   //$b is a pointer that start from end of the lenght $n-1 second  array moving down to zero
   for ($i = $m+$n-1, $a = $m-1, $b = $n-1; $b>=0; $i--) {
      if ($a >= 0 && $nums1[$a] > $nums2[$b]) $nums1[$i] = $nums1[$a--]; 
      else $nums1[$i] = $nums2[$b--];
   }
   print_r($nums1);
  }  
   function merge(&$nums1, $m, $nums2, $n) {
          ///margge and sort
                  
     $i = $m-1;//$m==total number of element in the two array
     $j = count($nums1)-1;
     $k = count($nums2)-1;

        while($i>=0 && $k>=0) {
             ///if the elem in first array is more than the element in the second array
            if($nums1[$i]>$nums2[$k]) {


                $nums1[$j--] = $nums1[$i];
                $nums1[$i--] = 0;
            } else {
                $nums1[$j--] = $nums2[$k--];
            }
        }


        if($i<0){
            while($j>=0) {
                $nums1[$j--] = $nums2[$k--];
            }
        }
        
       print_r($nums1);  
        
    }
    /////////////////////
      function intervalIntersection($firstList, $secondList) {
        $i = 0;
        $j = 0;
     
        $res  = [];
           while($i < count($firstList) && $j < count($secondList)){
         // while($p < $t ){
              
              $lo  = max($firstList[$i][0],$secondList[$j][0]); //take max val of the fiest ;
              $hi  = min($firstList[$i][1],$secondList[$j][1]);// take the min of the second

              if($lo <= $hi){  //if the second val is high

                  array_push($res,[$lo,$hi]);
            }

            if($hi == $firstList[$i][1])   $i++; //
            if($hi == $secondList[$j][1])  $j++; 

           
          }
          print_r($res);
        return $res;
    }
    //////////////////////
 
}
$s  = new Solution();
    
//var_dump( $s-> sortedSquares( [-7,-3,2,3,11]));
$a  = [1,2,3,0,0,0];
$s->mergeSort2($a , 3, [2,5,6],3);
$b = [1];
$firstList = [[0,2],[5,10],[13,23],[24,25]];
$secondList = [[1,5],[8,12],[15,24],[25,26]];
$s->intervalIntersection($firstList,$secondList);
//$s->merge($b,1,[],0);

///////////Two POinter aplication/////////////////////////////////////////////////////////////////////////////
//two pointer to reverse a string

function  addPairsWithTargetSum(array $a, int $targetSum, int $left, &$triplets) {
        $right = count($a)-1;

        while($left < $right) {
           $sum = $a[$left] + $a[$right];
            if($sum == $targetSum) {
               array_push($triplets, [$a[$left], $a[$right]] );
               // $triplets.add(Arrays.asList(-targetSum, a[left], a[right]));
                $left++;
                $right--;

                // Skip duplicates
                while($left < $right && $a[$left] == $a[$left-1]) {
                    $left++;
                }
                while($left < $right && $a[$right] == $a[$right+1]) {
                    $right--;
                }
            } else if($sum < $targetSum) {
                $left++;
            } else {
                $right--;
            }
        }
    }





  function findTripletsWithZeroSum($a) {
       sort($a);
       $triplets = [];
        for($i = 0; $i < count($a); $i++) {
            // Skip duplicates
            if($i > 0 && $a[$i] == $a[$i-1]) {
                continue;
            }
            // Fix one number a[i] and find pairs with sum -a[i] starting from index i+1
              addPairsWithTargetSum($a, -$a[$i], $i+1, $triplets);
        }
        print_r($triplets);
        return $triplets;
    }


findTripletsWithZeroSum( [-1, -1, 2, -1, -1, 2, -1, -1, 2]);





