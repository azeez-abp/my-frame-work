<?php

/**
 * The Decorator design pattern is a structural pattern that allows you to
 * dynamically add responsibilities or behaviors to objects without modifying their code
 * we need  Object 
 * and  object that add Behavious (decorator) to add
 *  It is often used to extend the functionality of classes in a flexible and reusable way
 */

// the object start

interface Human
{
    function walk();
    function talk();
}

class Woman implements Human
{

    function walk()
    {
        return "Walk";
    }
    function talk()
    {
        return "Talk";
    }
}
// the object end


// the object decorator start
//Object and object decorator are of the same type
abstract class Humandecorator implements Human
{
    protected Human $whatToDecorate; // decorator receive what to decorste as props
    function __construct(Human $woman)
    {
        $this->whatToDecorate = $woman;
    }
    abstract function add(string $what);
}

class BraDecorator extends  Humandecorator
{

    function walk()
    {
    }
    function talk()
    {
    }

    function add(string $bra)
    {
        return  $this->whatToDecorate->walk() . " with {$bra}"; //it has been decorate
        //var_dump($this);
    }
}

$d  = new BraDecorator(new \Woman());
echo $d->add("bra");


class PantDecorator extends  Humandecorator
{

    function walk()
    {
    }
    function talk()
    {
    }

    function add(string $pants)
    {
        return  $this->whatToDecorate->walk() . " with {$pants}"; //it has been decorate
        //var_dump($this);
    }
}
$e  = new BraDecorator(new \Woman());
echo $e->add("g-string pant");
