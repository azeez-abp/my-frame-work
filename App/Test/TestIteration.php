<?php
declare(strict_types=1);

namespace App\Test;
//file name must match one of the
class TestIteration {


  public float $amount  = 12.9;
  public string $name  = 'Iterable name';


  public function __construct(float $amount,string $name){
  	$this->amoun  = $amount;
  	$this->name  = $name;
  }

  public function setName(string $name):void{
 	 $this->name    = $name;

  }

   public function setAmount(string $amount){
      $this->amount  = $amount;

  }


}

class IterableCollection implements \Iterator {

   public function __construct(public array $iterationItems){

   }


   public function current():string{
   	echo __METHOD__." Call";
   	 return current($this->name);
   }
 


    public function next():string{
    	echo __METHOD__." Call";
         	 return next($this->name);
    }



    public function valid () :bool{
    	echo __METHOD__." Call";
      if(!empty($this->amount)){
      	return true;
      }
      return false;
    }
    
    public function key():float{
    		echo __METHOD__." Call";
         	 return key($this->amount);
    }


    public function rewind():void{
    		echo __METHOD__." Call";
    		print_r($this->iterationItems);
            reset($this->iterationItems);
    }

}


