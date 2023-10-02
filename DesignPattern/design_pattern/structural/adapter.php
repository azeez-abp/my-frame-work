<?php

/**
 * The Adapter design pattern is a structural pattern that allows objects with incompatible interfaces 
 * to work together. It involves creating an adapter class that acts as a bridge between two incompatible interfaces
 * Adapter is an object that convert one interface to another
 * 1. Identify the Incompatible Interfaces => interface 1
 * 2 Create the Target Interface => interface 2
 */

// Interface one start

interface TargetInterface1
{
    public function request_in1();
}

class Adaptee implements TargetInterface1
{
    public function request_in1()
    {
        echo "Adaptee's specific request\n";
    }
}

// Interface one end


// Interface two start

interface TargetInterface2
{
    public function request_in2();
}

class Adaptee2 implements TargetInterface2
{
    public function request_in2()
    {
        echo "Adaptee's specific request\n";
    }
}

// Interface two end



//Interface converter 

class Adapter implements TargetInterface1
{
    private $adaptee2;

    //TargetInterface2 converted  to TargetInterface1
    public function __construct(TargetInterface2 $adaptee2)
    {
        $this->adaptee2 = $adaptee2;
    }

    public function request_in1()
    {
        echo "Adapter's request\n";
        $this->adaptee2->request_in2();
    }
}


$adaptee2 = new Adaptee2();
//$adaptee2 alone can not call request_in1
$adapter = new Adapter($adaptee2);

$adapter->request_in1();


/////////////////////////////////////////////////using odiray classes



class A
{
    function getA(callable $m)
    {
        return $m();
    }

    function __invoke()
    {
        echo "\n";
        echo __METHOD__ . " call when " . __CLASS__ . "  called directly through " . __CLASS__ . "()()";
    }
}

class B
{
    function getB()
    {
        return __CLASS__;
    }
}


class ATOBConvertee
{
    private $A;
    private $B;
    function __construct(A $a, B $b)
    {
        $this->A  = $a;
        $this->B  = $b;
    }

    function convert()
    {
        return ($this->A)->getA([($this->B), 'getB']);
    }
}

echo ((new ATOBConvertee(new \A(), new \B()))->convert());

(new \A())();
//