<?php
declare(strict_types=1);
namespace APP\Test;
class TestA {

     protected string $name  = 'A';
     public function getName():string {
         return $this->name."\n";
	}
	
}


class TestB  extends TestA{
	 protected string $name  = 'B';

	
}

////Basic principle is the use of static keyword to represent the class
	 trait Helper{

		public static function help(){
			echo "HEPLIG";

		}
} 
class TestA2 {

      use Helper;

     protected  static string $name  = 'A2';

     public static function getName():string
    {
        // return self::$name."\n";//early static binding
          return static::$name."\n";//late static binding

	}

	public function __toString():string
	{
          return new static();    
	}
	
	public static function get():static
	{
          return new static();  //ie TestA2 class  
	}
}



class TestB2  extends TestA2{
      use Helper;
		
	 protected static string $name  = 'B2';

	 public static function replica():object
	 {
         return (new class {

         	  private static $val= "Anonymous";

         	  public function getValue():string{
         	  	return static::$val;
         	  }  
         });
	 }
	
}

/////////////////////////object comparison principle