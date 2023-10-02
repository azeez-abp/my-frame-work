<?php

namespace AbstractFactory;

/**
 * Abstract Factory patterns work around a super-factory which creates other factories. This factory is also called as factory of factories.
 * Since this is factory of factory we need to understand factory
 * Factory retrurn instance of a class by specifying key word to a method that return the obejct
 * we need factory
 * we need factories container
 *  
 */

// we need factories
interface AnimalFactorys
{
    public function createDog(): Dog;
    public function createCat(): Cat;
}
//BASIC; 
// abstract factory (pregnant class)  => return instance of the object to create in one of their method
// 
// Concrete Factories
class PetAnimalFactory implements AnimalFactorys
{
    public function createDog(): Dog
    {
        return new PetDog();
    }

    public function createCat(): Cat
    {
        return new PetCat();
    }
}

class WildAnimalFactory implements AnimalFactorys
{
    public function createDog(): Dog
    {
        return new WildDog();
    }

    public function createCat(): Cat
    {
        return new WildCat();
    }
}

// Abstract Products
interface Dog
{
    public function bark(): string;
}

interface Cat
{
    public function meow(): string;
}

// Concrete Products
class PetDog implements Dog
{
    public function bark(): string
    {
        return "Bark!";
    }
}

class PetCat implements Cat
{
    public function meow(): string
    {
        return "Meow!";
    }
}

class WildDog implements Dog
{
    public function bark(): string
    {
        return "Roar!";
    }
}

class WildCat implements Cat
{
    public function meow(): string
    {
        return "Growl!";
    }

    function speak(): string
    {
        return "Growl!";
    }

    function eat()
    {
    }
}


/*
The Abstract(no concrete) Factory pattern is a creational design pattern that provides an interface for creating families of related  objects without specifying their concrete classes.

This pattern is useful when you need to create multiple families of related objects, but you want to decouple the creation of those objects from the client code that uses them.

In this example, we have an AnimalFactory interface, which defines the methods that concrete factories must implement in order to create related objects. We then have two concrete factories, PetAnimalFactory and WildAnimalFactory, which implement the AnimalFactory interface and create related objects.

We also have two sets of related products, Dog and Cat. Each of these product interfaces has two concrete implementations, PetDog and WildDog for Dog, and PetCat and WildCat for Cat.

Here's how you could use the abstract factory

*/

$factory = new PetAnimalFactory();
$dog = $factory->createDog(); ///return object of d
$cat = $factory->createCat();

echo $dog->bark(); //


////////a class that conatains method(s) each return a distict object///////////the object is created by calling the method that contains it (since object creation is not through its instance, it is abstract) ///////////////////////////////////////ANOTHER EXAMPLE

interface GUIFactory
{ ///template for a class that return two objects
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

class HtmlFactory implements GUIFactory
{ //// we can have more than one this object
    public function createButton(): Button
    {
        return new HtmlButton();
    }
    public function createCheckbox(): Checkbox
    {
        return new HtmlCheckbox();
    }
}



interface Button
{
    public function render(): string;
}

class HtmlButton implements Button
{
    public function render(): string
    {
        return '<button>HTML Button</button>';
    }
}


interface Checkbox
{
    public function render(): string;
}

class HtmlCheckbox implements Checkbox
{
    public function render(): string
    {
        return '<input type="checkbox">HTML Checkbox</input>';
    }
}


$htmlFactory = new HtmlFactory();
$htmlButton = $htmlFactory->createButton();
$htmlCheckbox = $htmlFactory->createCheckbox();
