<?php

/**
 * A Builder class builds the final object step by step
 * we neeed objects
 */

interface CarPart
{
    function name();
    function add(string $part);
}

class Battary implements CarPart
{
    function name()
    {
        return "Battery";
    }
    function add(string $part)
    {
        return "{$part} added";
    }
}

class Engine implements CarPart
{
    function name()
    {
        return "Engine";
    }
    function add(string $part)
    {
        return "{$part} added";
    }
}

class Doors implements CarPart
{
    function name()
    {
        return "Doors";
    }
    function add(string $part)
    {
        return "{$part} added";
    }
}


//Buolder


class CarBulder
{
    private $battery;
    private $doors;
    private $engine;
    private $car =  "";

    function __construct()
    {
        $this->battery  = new Battary();
        $this->doors  = new Doors();
        $this->engine  = new Engine();
    }

    function add(CarPart $part)
    {
        $this->car .= $part->add($part->name());
        return $this;
    }
    function buildCar()
    {
        $car  = $this->add($this->battery)->add($this->engine)->add($this->doors);
        return $car;
    }
}



class Burger
{
    private $size;
    private $cheese;
    private $meat;

    public function __construct(string $size, bool $cheese, bool $meat)
    {
        $this->size = $size;
        $this->cheese = $cheese;
        $this->meat = $meat;
    }

    public function getDescription(): string
    {
        $description = "Burger with {$this->size} size";
        if ($this->cheese) {
            $description .= " and cheese";
        }
        if ($this->meat) {
            $description .= " and meat";
        }
        return $description;
    }
}

// Builder
interface BurgerBuilder
{
    public function setSize(string $size): BurgerBuilder;
    public function addCheese(): BurgerBuilder;
    public function addMeat(): BurgerBuilder;
    public function build(): Burger;
}

// Concrete Builder
class ClassicBurgerBuilder implements BurgerBuilder
{
    private $size;
    private $cheese = false;
    private $meat = false;

    public function setSize(string $size): BurgerBuilder
    {
        $this->size = $size;
        return $this;
    }

    public function addCheese(): BurgerBuilder
    {
        $this->cheese = true;
        return $this;
    }

    public function addMeat(): BurgerBuilder
    {
        $this->meat = true;
        return $this;
    }

    public function build(): Burger
    {
        return new Burger($this->size, $this->cheese, $this->meat);
    }
}


/*
BASIC 
builder class contain one method that return the instance of the class to build and build such class 
the builder represent the class they build by using their properties as augment to the class

Here's how you could use the builder:

*/

$builder = new ClassicBurgerBuilder();
$burger = $builder->setSize("medium")
    ->addCheese()
    ->addMeat()
    ->build();

echo $burger->getDescription(); // prints "Burger with medium size and cheese and meat"


$x  = 0;

function a()
{
    $x = 3;
}
a();
echo $x;

$y = 012;
$x = $y / 2;
echo  $x;

$a  = 'foo';
function foo()
{
    echo "hey";
}
$a();

function dos(&$x)
{
    $y = $x + 1;
    echo $y . " " . $x;
}

dos($v);
