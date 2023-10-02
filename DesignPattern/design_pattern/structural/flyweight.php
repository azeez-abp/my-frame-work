<?php

/**
 * Flyweight is a structural design pattern that lets you fit more objects into the available amount of RAM 
 * by sharing common parts of state between multiple objects instead of keeping all of the data in each object.

 * The Flyweight pattern is a structural design pattern that 
 * aims to optimize memory usage by sharing common data across multiple objects
 * 
 * objects have two types of states:
 * Intrinsic State: This state is shared among multiple objects and remains constant throughout their lifecycle. 
 * It's the data that can be shared and reused.
 * Extrinsic State: This state varies among different objects and is usually supplied externally.
 * The Flyweight pattern suggests that you stop storing the extrinsic state inside the object. 
 * Instead, you should pass this state to specific methods which rely on it
 * 
 * Since the same flyweight object can be used in different contexts, you have 
 * to make sure that its state can’t be modified.
 * 
 * This mehod is application when we are creating a number of obejects
 * 
 * shape : line (int, ext) , circle(int, ext) rect(int,ext)
 * 
 * we need diffent tyepes of object and 
 * Factory that will create and store them
 */



//diffent tyepes of object 


// Flyweight interface
interface Shapes
{
    public function draw($x, $y);
}

class Line implements Shapes
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function draw($x, $y)
    {
        echo "Drawing Line at ($x, $y) with color: $this->color" . PHP_EOL;
    }
}

class Oval implements Shapes
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function draw($x, $y)
    {
        echo "Drawing Oval at ($x, $y) with color: $this->color" . PHP_EOL;
    }
}

class Rectangle implements Shapes
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function draw($x, $y)
    {
        echo "Drawing Rectangle at ($x, $y) with color: $this->color" . PHP_EOL;
    }
}

class Circle implements Shapes
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function draw($x, $y)
    {
        echo "Drawing Circle at ($x, $y) with color: $this->color" . PHP_EOL;
    }
}



// Objects factory (return the object type if already store else create ,store and return the new object)
//Flyweight Factory
// Class used to get a player using HashMap (Returns
// an existing player if a player of given type exists.
// Else creates a new player and returns it.
class ShapeFactory
{
    private $shapes = [];

    public function getShape($type, $color)
    {
        $key = $type . $color;
        if (!isset($this->shapes[$key])) {
            switch ($type) {
                case 'Line':
                    $this->shapes[$key] = new Line($color);
                    break;
                case 'Oval':
                    $this->shapes[$key] = new Oval($color);
                    break;
                case 'Rectangle':
                    $this->shapes[$key] = new Rectangle($color);
                    break;
                case 'Circle':
                    $this->shapes[$key] = new Circle($color);
                    break;
                    // Add more cases for other shape types
            }
        }
        return $this->shapes[$key];
    }
}


///client


class GraphicsApp
{
    private $shapeFactory;

    public function __construct(ShapeFactory $shapeFactory)
    {
        $this->shapeFactory = $shapeFactory;
    }

    public function drawShape($type, $color, $x, $y)
    {
        $shape = $this->shapeFactory->getShape($type, $color);
        $shape->draw($x, $y);
    }
}

// Client code (GraphicsApp drawing shapes)
$shapeFactory = new ShapeFactory();
$app = new GraphicsApp($shapeFactory);

$app->drawShape('Line', 'red', 10, 20);
$app->drawShape('Oval', 'blue', 30, 40);
$app->drawShape('Rectangle', 'green', 50, 60);
$app->drawShape('Circle', 'yellow', 70, 80);
$app->drawShape('Line', 'blue', 10, 20);

// Shapes of different types and colors are drawn with shared intrinsic state and individual extrinsic state
// the Flyweight pattern is primarily illustrated by sharing instances of shapes based on their color, which is part of the extrinsic state
