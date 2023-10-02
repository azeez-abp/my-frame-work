<?php

namespace Des\Structural;
//// Adapter class implement adaptee interface(adaptee cannot implement it interface) and compose adaptee class as field

//// one class is couple with another through extendes(inheritance of class); implements(interface) and composition as field
/**

 * 
 * 
 * 
 * */
interface Rail
{

  function carry();
  function transform($content);
}
/**

 * 
 * 
 * */
class Car
{
  public  function move(): string
  {
    $walking  =  "Car is moving";
    return $walking;
  }

  public function recieve(mixed $content): mixed
  {
    echo $content;
  }
}

/**
 * compostion:
 * first is the interface
 * 
 * secondly, car that cannot use the interface appear
 * 
 * lastly what can use the interface(implement) come and user the interface and also carrry the object (compose as field) that cannot use the interface with it
 * 
 * structure: interface ===> class that implement the interface ==>compose the adaptee as field
 * 
 * 
 * */
class Adapter implements Rail
{
  // since AdapterRailWalker has implememts Rail, its type is Rail
  private Car $what_i_carry_on_interface;

  function __construct(Car $myCar)
  {
    $this->what_i_carry_on_interface = $myCar;
  }

  function carry()
  {
    echo "I carry car, Imagine car is walking on rail";
  }

  function transform($content)
  {
    return $content . " Transformed";
  }

  function giveContect(mixed $content)
  {
    return $content;
  }

  function getContent($content)
  {
    $transform  = $this->transform($content);
    return $transform;
  }

  function gets()
  {
    return $this->what_i_carry_on_interface;
  }
}

// $adapterRailWalker  = new AdapterRailWalker(new Car());
// echo gettype($adapterRailWalker)."\n";
// echo $adapterRailWalker->gets()->move();
//var_dump(get_class_methods($adapterRailWalker));