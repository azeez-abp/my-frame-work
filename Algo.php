 <?php
 
// IsArray.php                                                                
// IsBoolean.php                                                            
// IsCallable.php                                                           
// IsDouble.php                                                              
// IsInteger.php                                                            
// IsNumeric.php                                                             
// IsObject.php                                                               
// IsResource.php                                                             
// IsScalar.php                                                               
// IsString.php 

function fizzBuzz($n){
	for ($i=1; $i <=$n ; $i++) { 
        if ($i%15==0) {
         echo "FizzBuzz";
        }else if($i%3==0){
         echo "Fizz";
        }else if ($i%5==0) {
        echo "Buzz";
        }else{
            echo $i;
        }
    }

}
//$n = intval(trim(fgets(STDIN)));
//fizzBuzz($n);
// I will come to your house
// I will come to your house if am not bussy, but let me know if you are arround or not

function hamlesRandomNote($note,$text){
  ///////////////////convert the note to arra
	$noteArr  = explode(' ', $note);
   ///////////////////////consvert text to array
    $textArr   =  explode(' ', $text);

    $textObj   =  []; ///set an array that will count each word in text

    ///////////////loop the text array
      foreach ($textArr as $key => $wordInText) {
      	// if (!$textObj[$value] ) { will produce notice 
      	 if (empty($textObj[$wordInText]) ) { //if word is not in text
            $textObj[$wordInText] = 0;//put the word in array and assign it value to zero
      	 }
      
       $textObj[$wordInText]++; ////increase the value of the word by one if is in the text

      }
  //print_r($textObj);

    $noteIsPossibleToFrom   = true;
     $noteIsPossibleToFrom_  = "Is possible"; 
    foreach ($noteArr as $key2 => $wordInNote) {
      	 if (!empty($textObj[$wordInNote]) ) {////if the word in note is in text word list
      	 	$textObj[$wordInNote]--;

      	 	if ($textObj[$wordInNote] < 0 ) {
      	 		$noteIsPossibleToFrom  = false;
      	 		$noteIsPossibleToFrom_  = "Is not posible";
      	 	}
      	 	# code...
      	 }else{
      	 	$noteIsPossibleToFrom  = false;
      	 	$noteIsPossibleToFrom_  = "Is not posible";
      	 }

      	

      }  
   return $noteIsPossibleToFrom_;
}

// $n  ="I will will come to your house"; //fgets(STDIN);
// $t  = "I will come to your house if am not bussy, but let me know if you are will arround or not";//fgets(STDIN);
// echo hamlesRandomNote($n,$t);


function isPalindrome($text){
	$string  = strtolower($text);
	$lettersArr    = str_split( $string);
    $validLetters  = str_split(  "abcdefhhijklmnopqrstuvwxyz");
  
    $lettersNewArrStore  = [];
    foreach ($lettersArr as $key => $letter) {
    	 if (in_array($letter, $validLetters )) {///each letter in text is in all Alphabe array // if they suplly invalid character
    	 	  array_push($lettersNewArrStore, $letter);
    	 }
    }
   
  $convertThelettersNewArrStoreTOString   = implode(' ', $lettersNewArrStore);
  $reverserOflettersNewArrStore  = array_reverse($lettersNewArrStore);
   $reverserOflettersNewArrStoreToString  = implode(' ', $reverserOflettersNewArrStore);
   
    if ($convertThelettersNewArrStoreTOString===$reverserOflettersNewArrStoreToString) {
         return "is isPalindrome";	
      }else{
      	return " is not isPalindrome";
      }




  
}

// for ($i=97; $i <=122 ; $i++) { 
// 	echo '\''. chr($i).'\''. '=>'.($i-97+1).",\n";
// }
//echo isPalindrome('mams');

function caeSar($str,$shiftInt){
	//
	//echo chr(0x52);
	$shiftInt  = $shiftInt%26; //can not shift can 26
   $alphIndex  = [
     'a'=>1,
'b'=>2,
'c'=>3,
'd'=>4,
'e'=>5,
'f'=>6,
'g'=>7,
'h'=>8,
'i'=>9,
'j'=>10,
'k'=>11,
'l'=>12,
'm'=>13,
'n'=>14,
'o'=>15,
'p'=>16,
'q'=>17,
'r'=>18,
's'=>19,
't'=>20,
'u'=>21,
'v'=>22,
'w'=>23,
'x'=>24,
'y'=>25,
'z'=>26,
   ];
$srtArr  = str_split($str);
//print_r( $alphIndex);
  // print_r($srtArr);
   $codeStr  = '';
   foreach ($srtArr as $key => $letter) {
   	   if (!empty($alphIndex[strtolower($letter)])) {
   	   	  $index  = $alphIndex[$letter];
   	   	  $letterShiftByShiftInt  = $index+$shiftInt;
          //echo $letterShiftByShiftInt;
   	   	   if ($letterShiftByShiftInt>26) {
   	   	   	$letterShiftByShiftInt = $letterShiftByShiftInt%26;
   	   	   }

        //  echo $letterShiftByShiftInt."\n";
         $inverseAlphaIndex =  array_flip($alphIndex);
       //  print_r($inverseAlphaIndex);
         $codeStr  .=$inverseAlphaIndex[$letterShiftByShiftInt]; 
         //echo $inverseAlphaIndex[$letterShiftByShiftInt]."\n";;

   	   }
   }
  //echo $codeStr ;

  return $codeStr."\n";
}


//echo caeSar("olenini",5);


function decodeCaesar($str,$shiftInt){
      $alphIndex  = [
'a'=>1,
'b'=>2,
'c'=>3,
'd'=>4,
'e'=>5,
'f'=>6,
'g'=>7,
'h'=>8,
'i'=>9,
'j'=>10,
'k'=>11,
'l'=>12,
'm'=>13,
'n'=>14,
'o'=>15,
'p'=>16,
'q'=>17,
'r'=>18,
's'=>19,
't'=>20,
'u'=>21,
'v'=>22,
'w'=>23,
'x'=>24,
'y'=>25,
'z'=>26,   ];
	$srtArr  = str_split($str);
$inverseAlphaIndex =  array_flip($alphIndex);
   $codeStr  = '';
   foreach ($srtArr as $key => $letter) {
   	   if (!empty($alphIndex[strtolower($letter)])) {
   	   	   
          //echo "string";
           $letterIndex = $alphIndex[$letter];
        
          $shiftInt  = $shiftInt%26;

          $realIndex  = $letterIndex  - $shiftInt;
          if ($realIndex <1) {
          	$realIndex  = 26 -$realIndex;
          }
         $inverseAlphaIndex =  array_flip($alphIndex);
        
        $theLetter  = $inverseAlphaIndex[ $realIndex];

        $codeStr  .= $theLetter ; 
   	   	 
   	   }
   }
  echo $codeStr ;
}


//decodeCaesar(caeSar("olenini",5),5);

//decodeCaesar('tqjsnsn',5);



function reverseWord($text){
 
 $textArr   = explode(" ",$text);

 $reversWordArr  = [];
 $revWord  = "";
 $revWordWithEachWordRev  = "";
 
  foreach ($textArr as $key => $value) {
  	//  echo $key."\n";
  	 $numFromBack   =  (count($textArr)-1)-$key;
     $wordFromBack  =  $textArr[$numFromBack]; 
  	 $revWord .=$wordFromBack." ";
    $eachRevWordArr  = str_split( $wordFromBack );
        $eachWordRev  = '';
       ///break each word and reverse it
  	  for ($i=count( $eachRevWordArr  )-1; $i >=0  ; $i--) { 
  	    	
  	    	$eachWordRev .=$eachRevWordArr[$i];
  	    }  
  
       $revWordWithEachWordRev .= $eachWordRev." "; 
  }

echo  $revWord ;
echo $revWordWithEachWordRev;


}

//reverseWord("How are you doing");

function reverseArrayInPlace(array $arr){
   echo count($arr)/2;
	  for($i=0;$i < count($arr)/2 ; $i++){
	  	 echo $i."\n";
	  	 $temp =$arr[$i];
	  	 $arr[$i] = $arr[count($arr)-1-$i];
	  	 $arr[count($arr)-1-$i]  = $temp;
	  }

	  return $arr;
}

//print_r( reverseArrayInPlace([2,3,45,6,34,677,3]));

function orderArr(array $arr,$r=false){

  $new  = [];
  $flag = true;
  while ($flag) {
   $flag = false;
     for ($i=0; $i < count($arr)-1; $i++) { 
     	     echo $i;
     	       
     	       if (!$r) {
	     	       	if ($arr[$i] > $arr[$i+1] ) {
	     	       	  $tmp   = $arr[$i];
	     	       	  $arr[$i]  =  $arr[$i+1];

	     	       	  $arr[$i+1]  = $tmp;
	                  $flag = true;
	     	       }
     	       }else{

     	       	   if ($arr[$i] < $arr[$i+1] ) {
     	       	  $tmp   = $arr[$i];
     	       	  $arr[$i]  =  $arr[$i+1];

     	       	  $arr[$i+1]  = $tmp;
                  $flag = true;
     	       }
     	       }
     }

 //

}
//print_r($arr);
}
//orderArr([55,33,4,11,2,12,323,1212,32],false);

function meanMeadianMode($arr){

	function mean($arr)
	{
		 $sum = 0;
         foreach ($arr as $key => $value) {

            $sum  +=$value;
         }
         $mean  = $sum/count($arr);

         return $mean;
	}

    function median($arr){
    	sort($arr);
    	//print_r($arr);
       $ind   = count($arr)/2;
      // echo $ind;
       $median  =0;
       if ($ind%2==0) {
       //	echo "Event";
       	$median   = ($arr[$ind]+$arr[$ind-1])/2;
       }else{
        $median  = $arr[$ind];
       }
     // echo $median;
      return $median;
    }
median($arr);
	function mode($arr)
	{   
		 $freqArr  = [];
		 $sun = 0;
		 $mode=0;
         foreach ($arr as $key => $value) {
            if (empty($freqArr[$value])) {
            	$freqArr[$value] =0;
            }
            $freqArr[$value]++;//take the element if found increase by one
            $sun  +=$value;
         }
       
         $freq  = array_values($freqArr);
         rsort($freq);
         $freq  = array_values( $freq);
      
         // print_r($freq);
          $numMode=0;

        foreach ($freq as $key => $freqV) {
        	  
        	   if($freq[0]==$freqV){
        	 //  	 echo $freqV. " ".$freq[0]."\n";
        	   	 $numMode = $numMode+1 ;
        	   }
        
        }
       //  echo  $numMode;
        	   if ($numMode>1) {
        	   	$mode = "No mode";
        	   }else{
        	   	$mode  = array_flip($freqArr)[$freq[0]];
        	   }
return $mode;
	}

mode($arr);
	return [
		'mean' =>mean($arr),
		'meadian'=>median($arr),
		'mode'  =>mode($arr),

	];

}

//print_r( meanMeadianMode([22,3,4,4,4,43,3,3,32,3,4,3]));


function sunOfTwo(array $arr,int $sumto){
   
   $pair  = [];
   $counterPart  = [];

   foreach ($arr as $key => $value) {
   	    echo "////////////////////////////////"."\n" ;;
   	     $secondNum  = $sumto  - $value;
   	     if (in_array( $secondNum, $counterPart)) {
   	     	   // if (in_array($secondNum, $arr)) {
   	     	   	array_push($pair, [$value,$secondNum]);# code...
   	     	 //  }
   	     	
   	     }
   	      echo  $value."\n" ;
   	    array_push( $counterPart,  $value);
   	    ////note check the counter part push the value
       // echo  $secondNum."\n" ; 
       print_r($arr);
       print_r($counterPart);
      print_r( $pair );
      echo "////////////////////////////////";
   }

}

//sunOfTwo([1,-2,3,4,5,6,7],4);

//$input = array("a", "b", "c", "d", "e","f");

// $output = array_slice($input, 2);      // returns "c", "d", and "e"
// $output = array_slice($input, -2, 1);  // returns "d"
// $output = array_slice($input, 0, 3);   // returns "a", "b", and "c"

// note the differences in the array keys
// print_r(array_slice($input, 2/*skip two element*/, -1,/*remove one element from behind*/));
// print_r(array_slice($input, 2, -1, true));
// print_r(array_slice($input, count($input)/2, count($input), true));
// print_r(array_slice($input, 0, count($input)/2, true));
function binarySearch($arr,$search){
	//working for order element, the orderliness let us compare the value instead of key
	sort($arr);
           $arrLen  = count($arr);
           $midInd  = floor( $arrLen /2);
          
           $midEle  = $arr[$midInd];
           
      if ($midEle==$search) {
      	echo $midEle."  found";
      	return $midEle;
      }elseif( $midEle < $search  &&  $arrLen >1) {
      //	echo "less";
      return	binarySearch(array_splice($arr, $midInd,$arrLen),$search) ;
      }
      elseif ($midEle > $search  &&  $arrLen >1) {
      	
      		return binarySearch(array_splice($arr, 0,$midInd),$search) ;
      }else{
      	echo  $search." Not found";
      }
     
}

//binarySearch([1,2,3,3,34,44,55,3453,43],0);


function fibonacci($position){
  $num  = [];
  if ($position <3) {
    echo 1;
    echo "\n";
   return 1;
  }else{
     $curVAlue  = fibonacci($position-1) +  fibonacci($position-2);
     echo $curVAlue ;
     echo "\n";
  	return  $curVAlue  ;
  }


}

// function to demonstrate static variables
function static_var($num_)
{  
    //the scecrete code behide router and method chanin
    // static variable
    static $num = 6;  //save for the next call
    $sum = 2;
     
    $sum++;
    $num++;
    static $save  = [];
    array_push($save,$num);
     
    echo "\n". $num. " static num";
    echo "\n". $sum, " static sum";
    print_r ( $save);
}
 
// first function call
 static_var(7);
 
// // second function call
 static_var(6);

 static_var(5);


$testU  = function(){
 static  $ind  = -1;
 static $arg   = [];
   $arg[$ind++]  = ($ind+1)*3;
 print_r($arg);
 print_r(func_get_args());

};

// call_user_func_array($testU, ['abo','olorun']);
// call_user_func_array($testU, ['abo','olorun']);


//echo fibonacci(6);
$memoize = function($func)
{
    return function() use ($func)
    {
        static $cache = [];

        $args = func_get_args();///get the array of aug pass into the its function
        $key = md5(serialize($args));

        if ( ! isset($cache[$key])) {
            $cache[$key] = call_user_func_array($func, $args);
        }

        return $cache[$key];
    };
};

$factorial = $memoize(function($n) use (&$factorial)
{
    return ($n < 2) ? 1 : $n * $factorial($n - 1);
});

$fibonacci = $memoize(function($n) use (&$fibonacci) 
{ //if & is remove $fibonacci will no be pass &$fibonacci mean reuse your self 
    return ($n < 2) ? $n : $fibonacci($n - 1) + $fibonacci($n - 2);
});

$loop  = function($num) use(&$loop){//& mean ur self
   if($num>0){
    echo $num."\n";
    return $loop($num-1);
   }else{ return 0;} ;
  
};
//echo $loop(5);
function loop2($num){
  if($num>0){
    echo $num."\n";
    return loop2($num-1);
   }else{ return 0;} ;
  
}
//loop2(8);
//echo $factorial(50); // 3628800

//echo $fibonacci(50); // 55
function fibonacciMem($position,$mem=null){

	static $mem  = [];///static mean do delete this in mem after execusion; reuse it as ctache i.e memory
  ///what is not delete from memory after excecution is called cache 
  // echo $position." ";
	if (!empty($mem[$position]) ) {
    echo "string";
		return $mem[$position];# code...
	}else{
	 if ($position <3) {
   // echo "loop done";
    echo "1";
   return 1;
  }else{
  	$mem[$position]= fibonacciMem($position-1,$mem) +	fibonacciMem($position-2,$mem);
    echo $mem[$position]."\n";
  }	

	}
  print_r($mem);
   return $mem[$position];
}
//echo (fibonacciMem(50));
function factorialMem($num,$mem=[]){
    static $mem  = []; //static mean do not delete
     // print_r($mem);
    if (!empty($mem[$num])) {
      echo $mem[$num]."\n";
       return $mem[$num]; 
    }else{
      if($num>1){
        $mem[$num]  = $num*factorialMem($num-1,$mem);
        echo $mem[$num]."\n";
         print_r($mem);
      return  $mem[$num];
    }else{
      return 1;
    }

    }
  //print_r($mem);
    


}
factorialMem(3);



// function Solution($arr) {
//        $count= 0;
//        $max = 0;
//        $input = (int)trim(fgets(STDIN));
        
//         foreach ($arr as $key => $value) {
//           if($i>$value);
//            $count+=1;
//           if($count%2==0)
//         }


//    }

   function numPlayers($k, $scores) {
    // Write your code here
    rsort($scores);
    $uniqueScores  = [];     
     foreach ($scores as $key => $value) {
     	  if (!in_array($value, $uniqueScores)) {
     	      array_push($uniqueScores, $value);
     	  }
     }
    $rank  =  [];
    foreach ($scores as $scoreIndex => $score) {
            
              if (in_array($score, $uniqueScores)) {
              	 $flipUninqueScore  =  array_flip($uniqueScores);
              	 array_push($rank,$flipUninqueScore[$score]+1  );
              }


    }
   print_r($uniqueScores); 
   // array_unique($score);
  print_r($rank);

 $quliFromRank  =  array_splice($rank, 0,$k);//from zero index select k (eg.k=3) element

  print_r( $quliFromRank);

}
//numPlayers(4,[10,20,40,60,20,80,100,60,80]);


function minPlus($arr){
	  $numP  =0;
	  $numMin  = 0;
	  $numZero=0;
	foreach ($arr as $key => $value) {
		  if ($value < 0) {
		  	 $numMin++;
		  }

		   if ($value == 0) {
		  	  $numZero++;
		  }

		    if ($value > 0) {
		  	   $numP++;
		  }
		# code...
	}

$fp  = $numP/count($arr);

$fm  = $numMin/count($arr);

$fz  = $numZero/count($arr);

echo $fp."\n".$fm."\n".$fz;
}
//minPlus([-4, 3, -9, 0, 4, 1]);
function miniMaxSum($arr) {
    // Write your code here
$min = 0;
        $max =  0 ;  // Write your code here
foreach ($arr as $key => $value) {
        
        $min = 0;
        $max =  0 ;  // Write your code here
            foreach ($arr as $key => $value) {
                    if ($key!=(count($arr)-1)) {

                        $min = $min+$value;
                    }
                    if ($key!= 0 ) {
                    	echo $key."\n";
                        $max=$max+$value;
                    }
                }
            }     
  echo $max." ".$min;
}



function anagramatics(){

$sent  = ['the','goat','died','inside','the'];
 shuffle($sent);

 $newS  = 'water ';
 
   foreach ($sent as $key => $value) {
   	$newS   .=$value." "; 
   	# code...
   }
echo $newS;
}// $arr_temp = rtrim(fgets(STDIN));
//anagramatics();

// $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

// miniMaxSum($arr);
// miniMaxSum([1,2, 3, 4, 5]);

// $variable  = [1,2,3,4];
// foreach ($variable  as $key => &$value) 
//     $value ++;


//   $a  = [1,2,3];
//   $b  = [2,3,5];
//   print_r(array_diff($a, $b));
//    print_r(array_diff($b, $a));

//    echo ;

$arr__  =Array
(
   ['order'=>6],
    ['order'=>5],
     ['order'=>5],
      ['order'=>8],

) ;

 function sortByOrder($a, $b) {
  return $a['order'] - $b['order'];
}

//usort($arr__ , 'sortByOrder');
//print_r($arr__ );


/*
Iterator method
public current(): mixed
public key(): mixed
public next(): void
public rewind(): void
public valid(): bool
*/
function treeFunc(){
 
   class Tree{
 
     private $node =null;
      ///right is greater than left
     function __construct(){
        $this->root  = null;
        ///if node ===null , first node is the root

     }

    public function addValue($nodeVal){
         $node  = new Node($nodeVal);
          if($this->node ===null){
                $this->root = $node;
          }else{
            $this->root->addNode($node);
          }
    }


    

      public function isPresent($data){

          $current = $this->root;
          while($current){
            if($data===$current->$data){
                return true;
            }

            if($data < $current->$data ){
                $current  = $current->left;
            }else{
                $current  = $current->right;
            }
          }


          return false;
      }


      public function findMin(){
          $current  =$this->root;
          while($current->left !== null){
            $current  = $this->left;
          }
          return $current->$data;
      }

      public function findMinLeft(){
          $current  =$this->root;
           $count  = 0;
          while($current->left !== null){
            $count++;
            $current  = $this->left;
          }
          return $count ;
      }



       public function findMAx(){
         $current  =$this->root;
          while($current->right !== null){
            $current  = $this->right;
          }
          return $current->$data;
       }

   }


   class Node{

       private $data  = null;
       private $left = null;
       private $right = null;

       public function __construct($data,$letf =null , $right =null){
        $this->data   =$data;
        $this->left  = $left;
        $this->right = $right;

       }

       public function addNode(Node $node){

          if($node->data > $this->data){
            /// i will go to left
               if($this->left == null){
                $this->left  = $node;
              }else{
                 $this->left->addNode( $node); //recursion 
              }
          
          } else{
            if($this->right == null){
                $this->right  = $node;
              }else{
                 $this->right->addNode( $node); //recursion 
              }
          } 
        
    }

   }

  
    

   $tree  = new Tree();
    $tree->addValue(1);
    $tree->addValue(2);
    $tree->addValue(3);
    $tree->addValue(50);
    $tree->addValue(30);
    $tree->addValue(25);
    $tree->addValue(100);
    

   var_dump($tree);


}

//treeFunc();



function doblyLinkedList(){




//node structure
class Node {
public $data;
public $next;// is another node that carries data
}

class LinkedList {
public $head;

//constructor to create an empty LinkedList
public function __construct(){
$this->head = null;
}
};


// test the code
//create an empty LinkedList
$MyList = new LinkedList();

//Add first node.
$first = new Node();
$first->data = 10;
$first->next = null;
//linking with head node
$MyList->head = $first;

//Add second node.
$second = new Node();
$second->data = 20;
$second->next = null;
//linking with first node
$first->next = $second;

//Add third node.
$third = new Node();
$third->data = 30;
$third->next = null;
//linking with second node
$second->next = $third;


public function PrintList() {
//1. create a temp node pointing to head
$temp = new Node();
$temp = $this->head;

//2. if the temp node is not null continue
// displaying the content and move to the
// next node till the temp becomes null
if($temp != null) {
echo "\nThe list contains: ";
while($temp != null) {
echo $temp->data." ";
$temp = $temp->next;
}
} else {

//3. If the temp node is null at the start,
// the list is empty
echo "\nThe list is empty.";
}
}


public function push_back($newElement) {

//1. allocate node
$newNode = new Node();

//2. assign data element
$newNode->data = $newElement;

//3. assign null to the next of new node
$newNode->next = null;

//4. Check the Linked List is empty or not,
// if empty make the new node as head
if($this->head == null) {
$this->head = $newNode;
} else {

//5. Else, traverse to the last node
$temp = new Node();
$temp = $this->head;
while($temp->next != null) {
$temp = $temp->next;
}

//6. Change the next of last node to new node
$temp->next = $newNode;
}
}








    class DoublyLikedList implements Iterator{
        
    
     public function __construct() {
        $this->position = 0;
    }

    public function rewind(): void {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    #[ReturnTypeWillChange]
    public function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    #[ReturnTypeWillChange]
    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    public function next(): void {
        var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid(): bool {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
    }


}



function stack(){
  
   class Stack  {
        private int $len =0;
        private array $data = [];

      function __construct() {
         // $this->data = $data;
         // $this->len  =$len;
      } 
      
    

      public function isEmpty():bool{
        return $this->len == 0;
      }
    
     public function addElement(mixed $element):void {
          $this->data[$this->len]  = $element; 
          $this->len++;  
     }

     public function getElement(){
            $new_data  = [];
             $req_data  =  $this->data[ $this->len - 1 ];  
             $total  = 0;
             $new_len = $this->len - 1 ;

             while($total != $new_len){
                echo "{$total}  $new_len \n";
                $new_data[ $total ]  = $this->data[$total];
                $total++;
             }

             $this->data  = $new_data;
             $this->len  = $this->len  - 1;
            return  $req_data;
          
     }

     public function searchElement($element){
          
           while ($this->len >0){
             if($this->data[ $this->len - 1 ] === $element){
                return true;  
             }
             
             $this->len--;
           }

           return false;

     }
    
    public function update(int $pos,$ele){

          if(!$this->data[$pos-1]){
            return "Item {$ele} is not fount";
          }
        $this->data[$pos-1] = $ele;

    }
    
 
   public function total(){
    return $this->len;
   }

    public function getAll(){
        return var_dump($this->data);
    }
   }
echo "================================undo / redo = ==function call==================\n";
       $stack  = new Stack();
      $stack->addElement(2);
      $stack->addElement(3);
      $stack->addElement(6);
      echo $stack->total()."\n";
      echo $stack->getElement()."=====\n";
      echo $stack->getElement()."=====\n";
      echo $stack->getElement()."=====\n";
      $emp = $stack->isEmpty()?" is Empty ":" Is not Empty";
      echo $emp;
      $stack->getAll();
echo "=====================================================\n";

  ///push
  //search
  //isEmpty
  //pop
  //updater  
}
//stack();

 //if( !is_array( $items ) && !$items instanceof Traversable ) we can't use forEach


function searchingAlgo(){

class SearchAlgo{
        
   public function __construct()
   {
    $this->callTime=0;
   }     
   
public function binarySearch($items ,$search){
     sort($items);
     $this->callTime++;
   //  var_dump($items);
   /////Are we looking for the item (is item we are looking for) or item position
    $midInd  =  floor((count($items)-1)/2);
    //echo $midInd;
     

    if($items[$midInd]==$search){
        return $items[$midInd];

    }else{
        
         if(count($items)==1 && $items[0] !== $search){
            return "NO in the item";
         }
          print_r($items);
        ///because we have sort the item in increasing order
        /////////////////////////////////////////////////////////////
       if($items[$midInd] < $search) {
        ///what we are looking for is still ahead
        
        ////is index higher
          //$search >$midIndex ==>look ahead 
        $new_item   = [];
            $newIndex  = -1;
        
        foreach($items as $key => $val){
             if($key >$midInd){
                $newIndex++;
                $new_item[$newIndex] = $val;
             }
        }
        $items  = $new_item;
        echo $this->callTime;
        print_r($items); 
        // if($this->callTime==5){
        //     return false ;
        // };
      return $this->binarySearch($items,$search);
    }  
  ///////////////////////////////////////////////////////////////////////
      else{      
                  $new_item   = [];
                 $newIndex  = -1;
                   var_dump($items);
                foreach($items as $key => $val){
                     if($key < $midInd){
                        $newIndex++;
                        $new_item[$newIndex] = $val;
             }
        }
        $items = $new_item;
    return  $this->binarySearch($items,$search);

    }
return "0";
}
}

////////////////////////////////////////////////////
public  function InterpolationSearch_($list, $data) {
    $lo = 0;
    $mid = -1;
    $hi = count($list) - 1;
    $index = -1;

    while ($lo <= $hi) {
        $mid = (int)($lo + (((double)($hi - $lo) / ($list[$hi] - $list[$lo])) * ($data - $list[$lo])));

        if ($list[$mid] == $data) {
            $index = $mid;
            break;
        }
        else {
            if ($list[$mid] < $data)
                $lo = $mid + 1;
            else
                $hi = $mid - 1;
        }
    }

    return $index;
}

/////////////////////////////////////////////////////

  public function InterpolationSearch($items,$search){
    //$search is the value , Item must be ordered
        $upperBound  = count($item)-1;
       $lowerBound   = 0;
       $prob  =0;
       
        while($search >= $item[$lowerBound] && $search <= $item[$upperBound]&& $lowerBound <= $upperBound){

               $prob  = $lowerBound+($upperBound- $lowerBound) *($search-$items[$lowerBound])/ ($item[$upperBound]-$item[$lowerBound]);

              print_r($prob);

              if($items[$prob]===$search){
                return $prob;
              }else if($items[$prob] < $search){
                $lowerBound  = $prob+1;// go ahead in one step $items  = array_splice($item,$prob,count($items)-1)
              }else{
                $upperBound  = $prob - 1; //go back in one step
              }

        }                                                                                                                                                                          


  }







}



//$search  = new SearchAlgo();
//echo $search->binarySearch([212,2,3,23,23,23,23,1223,23,2,32,2132,32,45], 212);
//echo $search->binarySearch(['bisi','zuzi','azeez','kola'], 'azeez');
}
//searchingAlgo();


function subset($arr){
    $sup  = [[]];

      for ($x=0; $x < count($arr) ; $x++) { 

             for ($y=0; $y < count($arr) ; $y++) { 
                 
                   if($arr[$x]===$arr[$y]){
                   $a  = [$arr[$x]];
                       array_push($sup,$a);
                   }else{
                      if(!in_array(  [$arr[$y],$arr[$x]] ,$sup  )){
                         $b= [$arr[$x],$arr[$y]];
                       array_push($sup,$b);
                      }
                   
                   }
             }
        
      }

      array_push($sup,$arr);
    return $sup;
}



function subSet2($arr){
/////n**2 =>n length of arr i.e length of steo
   $len    =count($arr)-1;
   $len2    =count($arr)-1;
    $sup   =[[]];
    $time =0;
    echo $len;
    $len--;
    if($len < 0){
        return 'done';
    }else{
       return subSet2($arr,$len-1);  
    }
    
   

  // while($len >-1){
  //   $time++;
  //   for ($x=0; $x < $len2 ; $x++) { 

  //         array_push($sup ) // code...
  //   }
   
  //   $len--;
  // }

}
//subSet2([1,2,3]);
//print_r(subset([1,2,3]));
//var_dump(subset([1,2,3]) );







function findLength(int $nums, int $k):int {
     $left = 0;
     $curr = 0;
     $ans = 0;

    for ($right = 0; $right < count($nums); $right++) {
        $curr += $nums[$right];
        while ($curr > $k) {
            $curr -= $nums[$left];
            $left++;
        }

        $ans =      max($nas,$right-$left+1) ;//    Math.max(ans, right - left + 1);
    }

    return $ans;
}


function grid_path($x,$y){
    if($x==1 || $y==1){
        return 1;
    }else{
        return grid_path($x-1,$m)+grid_path($x,$y-1);
    }

  
}



  function sorting(){

   function swap($a,$b){
  $temp  = $a;
  $a  = $b;
  $b   =   $temp;
  echo $a.'  is now value of b'."\n";
  echo $b.'  is now value of a'."\n";
  return [$a,$b];
}

swap(4,60);

function bubbleSort($arr){

///////////////dont use for large data set

    for($i=0 ; $i < count($arr)-1 ;$i++ ){
      ////[45,3,5,44,3,2] 
        ////index    =  0-5

       
          for($j=0 ; $j < count($arr)-1-$i ;$j++ ){
             ///when i == 0 
              /// the lenght of loop j index 0 ==>5
            ///// i == 1   loop  j index is 0 ==>4
            /// as i increase the j index decrease
           echo "[".$i. " ".$j. "]" . "\n";
           echo "[".$j. " ".($j+1). "]" . "\n";
            echo "[".$arr[$j]. " ".$arr[($j+1)]. "]" . "\n";

           if($arr[$j] < $arr[$j+1]){
               $temp   = $arr[$j];
               $arr[$j] = $arr[$j+1];
               $arr[$j+1]  = $temp;
            // swap($arr[$j],$arr[$j+1]);

           }


     }  

      echo "\n";

         
    }
    print_r($arr);
}

//bubbleSort([30,5,50,10]);


 function insertionSort($array){

    for ($i=1; $i < count($array) ; $i++) { 
          $currentIndex  = $i;
          $currentValue   = $array[$currentIndex];

          $prevIndex  = $i-1;
          $previousValue  = $array[$prevIndex];

          while($prevIndex >= 0 && $previousValue  >  $currentValue ){
               $currentValue  = $previousValue ;
               $prevIndex--;
          }
            $array[$prevIndex]  = $currentValue;
    }

 }

function merge($left_array,$right_array,$original_array){
    $left_array_len   = floor(count($original_array)/2);
    $right_array_len  = floor(count($original_array))  - $left_array_len;

    $i = 0; $l= 0; $r  =0;
       while($l <$left_array_len && $r < $right_array_len){
         if($left_array[$l] < $right_array[$r]){
            $original_array[$i]  = $left_array[$l];
            $i++;
            $l++;
         }else{
            $original_array[$i]  = $right_array[$r];
            $i++;
            $r++
         }
       } 

       while($l <$left_array_len){
         if($left_array[$l] < $right_array[$l]){
            $original_array[$i]  = $left_array[$l];
            $i++;
            $l++;
         }
       } 

      while($r < $right_array_len){
         if($left_array[$l] < $right_array[$r]){
            $original_array[$i]  = $left_array[$r];
            $i++;
            $l++; 
         }
       } 


}


function mergeSort($list){
    ////divide and conquer
    //sort from below to above
    ////continue dividen into two
    $len  = count($list);
    if($len <= 1 ) return ;
    $middle  = floor($len/2);
    $left_array  = array_slice($list, 0 , $middle);
    $right_array  = array_slice($list, $middle, $len);
    
      $i  =  0 ;  //brgin of left array 
      $j  = 0;  // begin of the right array
    print_r($left_array);
    print_r($right_array);
    
     for (; $i < $len; $i++) { 
           if($i < $middle){
               $left_array[$i]  = $list[$i];
           }else{
            $right_array[$j]  = $list[$i]; 
            $j++;
           }
     }
     
      mergeSort($left_array);
      mergeSort($right_array);
      merge($left_array,$right_array,$list);


  }

  mergeSort([10,3,20,40,13,45,21]);
}


sorting();



function userInput()
{

// Input section
// $a = 10
$a = (int)readline('Enter an integer: ');
 
// $b = 9.78
$b = (float)readline('Enter a floating'
            . ' point number: ');
 
// Entered integer is 10 and
// entered float is 9.78
echo "Entered integer is " . $a
    . " and entered float is " . $b;


    $arr = explode(' ', readline("\n Enetr number with space separation"));
 
// For output

print_r($arr);
}

//userInput();



function cipher_funct(){

function Cipher($ch, $key)
{
    if (!ctype_alpha($ch))///ctype_alpha It checks if all of the characters in the provided string, text, are alphabetic.
        return $ch;

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');//To convert to ASCII from textual characters, you should use the chr() an ASCII value as its only parameter and returns the text equivalent
    //The ord() function does the opposite - it takes a string and returns the equivalent ASCII value.
    return chr(fmod( ((ord($ch) + $key) - $offset), 26) + $offset);//fmod Return the remainder of x/y
}

function Encipher($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cipher($ch, $key);

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}

$text = "The quick brown fox jumps over the lazy dog";
$cipherText = Encipher($text, 3);
$plainText = Decipher($cipherText, 3);

}



//cipher();


function TowerofHanoi($diskCount, $fromPole, $toPole, $viaPole)
{
    if ($diskCount == 1)
    {
        echo "Move disk from pole " . $fromPole . " to pole " . $toPole . "<br/>";
    }
    else
    {
        TowerofHanoi($diskCount - 1, $fromPole, $viaPole, $toPole);//(4-1,1,3,2)
        TowerofHanoi(1, $fromPole, $toPole, $viaPole);//(4,1,2,3)
        TowerofHanoi($diskCount - 1, $viaPole, $toPole, $fromPole);//(4-1,3,2,1)
    }
}

//TowerofHanoi(4, 1, 2, 3);

function isPalindrome($input)
{
    if (strlen($input) == 0 || strlen($input) == 1) {
        return "YES";
    }

    if (substr($input, 0, 1) === substr($input, strlen($input) - 1, 1)) {
        ///if the first and last letter are equall
        // echo substr($input, 1, strlen($input) - 2) . "\n"; 
        //take the string remove the first and the last letter , return the remain to the function
        return isPalindrome(substr($input, 1, strlen($input) - 2));
    }
    return "NOT";
}
//echo isPalindrome('racecar');

function checkIfPalindrome(string $s) {
    //two pointer method
    $left = 0;
    $right = strlen($s) - 1;

    while ($left < $right) {
        if(substr($s, $left,1)  != substr($s, $right,1) )

       // if ($s.charAt(left) != $s.charAt(right)) {
            return false;
        }

        $left++;
        $right--;
    return true;     
    }

   


function findLength(array $nums, int $k) {
    //sliding window
   $left = 0;
   $curr = 0;
   $ans  = 0;

    for ($index = 0; $index < count($nums); $index++) {
        $curr += $nums[$index];
        while ($curr > $k) {
            $curr -= $nums[$left];
            $left++;
        }

        $ans =max($ans, $index - $left + 1) ;
        //Math.max(ans, right - left + 1);
    }

    return $ans;
}
//echo findLength([3, 1, 2, 7, 4, 2, 1, 1, 5],8);
//& means copy  reference (let them point to the same mem location)
function by_value_or_refernce(){
    $v  = 3;
    $b  = $v;
    ++$v;
    --$b;
     //b and v value will be diffence this is copy by value
     $v2  = 3;
     $b2  = &$v;
    ++$v2;
    --$b2;
    //b2 and v2 value will be same this is copy by reference &=>mem location

    echo " thee value of \$v  = {$v} and the value of \$b is {$b} \n \$b2 is $b2 and \$v2   = $v2  ";
}

//by_value_or_refernce();

class SolutionInt {

    /**
     * @param Integer[][] $firstList
     * @param Integer[][] $secondList
     * @return Integer[][]
     * intersection of  [1, 3] and [2, 4] is [2, 3]  
     * compare index zero and zero  take the highest one  ===>situation  A
     * conpare index one and index one take the lowest one ===> situation B
     * if the number in situation B is greater than number in situation A  take [B,A] =>is intersect
     * 
     * 
     */
    function intervalIntersection($firstList, $secondList) {
        $i = 0;
        $j = 0;
     
        $res  = [];
           while($i < count($firstList) && $j < count($secondList)){
         // while($p < $t ){
              
              $lo  = max($firstList[$i][0],$secondList[$j][0]); //take max val of the firest ;
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
}


 function removeDuplicates($s) {
       
        
        $res  = [];
        for($i=0;$i<strlen($s);$i++){
             
            if(in_array($s[$i],$res)){
                $ele  = $s[$i];
             $filter  = function($n) use($ele){
                 return $n !== $ele;
             } ;  
               $res  = array_filter($res,$filter);
                print_r($res);
            }else{
               
                array_push($res,$s[$i]);
            }
            
            }
         return join("",$res);
    }

///___clone is called when object is clone and act as the constructor for the clone object
//https://www.programmingalgorithms.com/algorithm/caesar-cipher/php/
    // the state of the web is store in the session (every thing related to the user)

// cd  C:/xampp/htdocs/code




function Cipher($ch, $key)
{
    if (!ctype_alpha($ch))
        return $ch;

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cipher($ch, $key);

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}





