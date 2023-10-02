<?php

function smallesNumber(int $n){
	 $ans   = ""
	for ($i=2; $i < 10 ; $i++) { ///can 2 to 9 divide the numebr
		 while($n % $i == 0){
             $n  = $n/$i;
             $ans  = $i.$ans
		 }
	}

	if($n != 1){
		return -1;
	}else{
		return int() $ans;
	}	
}
