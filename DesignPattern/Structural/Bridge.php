<?php

  ////  Bridge is an abstract class that require 
   //// Redefine  Abstraction class through extends it; Redefine class extende abstract class Bridge
  //// Compose of concrete classes throug im

/*
composition:
 the first is the abstract class
 the second (Redefine Abstraction)are the classes that extend Bridge abstract class
 the third is the interface for creating concrete class
 the fourth is the conctrete class the implement interface

structure:  
Redefine Abstraction extend abstract class Bridge
Concrete classes implement interface

Redefine Abstraction classes take the concrete classes as their field(composition)

*/

abstract class Vehicle{

	private string $door;

	public function setTyre(int $num):void{
		$this->tyre  = $num;
	}

	function getTyre():int{
		return $this->tyre;
	}

}

class Car extends Vehicle{
   function __construct (Sector $producder,Sector $marketer){
   	$this->producer = $producder;
   	$this->marketer  = $marketer;
   }

   function getMarketer(){
   	return $this->marketer;
   }
}

class Bike extends Vehicle{

function __construct (Sector $producder,Sector $marketer){
   	$this->producer = $producder;
   	$this->marketer  = $marketer;
   }

   function getMarketer(){
   	return $this->marketer;
   }

}


interface Sector{
	function assemble();
	function paint();
	function sell();
}


class Producder implements Sector{
  function assemble(){echo "assemble";}
	function paint(){echo "Paint";}
	function sell(){echo "Sell";}
}

class Marketer implements Sector{

	 function assemble(){echo "assemble";}
	function paint(){echo "Paint";}
	function sell(){echo "Sell";}
	function promote($item){echo "Promote $item ";}
	
}

 
$car  = new Car(new Producder(),new Marketer());
$car->getMarketer()->promote('car');

$car2  = new Bike(new Producder(),new Marketer());
$car2->getMarketer()->promote('bike');