<?php
declare(strict_types=1);

namespace App\Test;

//colection is array of classes
class ItereableCollection implements \IteratorAggregate {

   public function __construct(public array $iterationItems){

   }

   public function getIterator(){
      return new \ArrayIterator($this->iterationItems);
   }

   // public function current():array{
   // 	echo __METHOD__." Call";
   // 	 return $this->iterationItems;
   // }
 


   //  public function next():array{
   //  	echo __METHOD__." Call";
   //    echo gettype($this->iterationItems)."\n";
   //    echo gettype(next($this->iterationItems))."\n";
   //       	 return  $this->iterationItems;
   //  }



   //  public function valid () :bool{
   //   return current($this->iterationItems) !=false;
   //  }
    
   //  public function key():float{
   //  		echo __METHOD__." Call";
   //       	 return \key($this->iterationItems);
   //  }


   //  public function rewind(){
   //  		echo __METHOD__." Call";
   //        reset($this->iterationItems);
   //        return $this->iterationItems;
   //  }

}