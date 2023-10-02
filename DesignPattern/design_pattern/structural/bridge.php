<?php

/**
 * decouples an abstraction from its implementation
 * it is used  when item and it props is separated (Car shape, shape color)
 * Absstraction is the object, implementation is the props ,
 * implementation is injected into Abstraction
 */

/**
//class A and class B extend abstract class C
                                             //====> link through dependency abstration require inplementation as dependency
// class E and class F implements class 
 */
// Abstraction start
abstract class Shape
{
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    abstract public function draw();
}

// Refined Abstraction
class Circle extends Shape
{
    private $radius;

    public function __construct(Color $color, $radius)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw()
    {
        return "Drawing a circle with radius " . $this->radius . " and color " . $this->color->fill();
    }
}

// Refined Abstraction
class Rectangle extends Shape
{
    ///combiner depent on implentation by taking the as augument
    private $width;
    private $height;

    public function __construct(Color $color, $width, $height)
    {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw()
    {
        return "Drawing a rectangle with width " . $this->width . ", height " . $this->height . " and color " . $this->color->fill();
    }
}

// Abstraction End


// Implementation start
interface Color
{
    public function fill();
}

// Concrete Implementation
class Red implements Color
{
    public function fill()
    {
        return "red";
    }
}

// Concrete Implementation
class Blue implements Color
{
    public function fill()
    {
        return "blue";
    }
}

// Implementation End




// Client code
$red = new Red();
$blue = new Blue();
$circle = new Circle($red, 5);
$rectangle = new Rectangle($blue, 10, 5);
/// implemetation and abstraction
echo $circle->draw() . "\n";
echo $rectangle->draw();
