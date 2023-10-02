<?php
////trsting the implement and type isomorphosu
/**
 * provides an interface for creating objects 
 * we need Objects 
 * we need the factory
 * it can be one to one or one to many
 */


interface Book
{
	public function open(): string;
	public function goToNextPage(): string;
	public function close(): string;
}


abstract class Books
{
	// can not conatin body {}
	abstract public function open(): string;
}

class Chemistry implements Book
{
	function __construct()
	{
		print_r(__CLASS__);
	}
	function open(): string
	{
	}

	function goToNextPage(): string
	{
	}

	function close(): string
	{
	}
}

class Biology extends Books
{
	function __construct()
	{
		print_r(__CLASS__);
	}
	function open(): string
	{
	}

	function goToNextPage(): string
	{
	}

	function close(): string
	{
	}
}


class Math extends Books implements Book
{
	function __construct()
	{
		print_r(__CLASS__);
	}
	function open(): string
	{
	}

	function goToNextPage(): string
	{
	}

	function close(): string
	{
	}
}




function getTypesBooks(Books $book)
{
	echo get_class($book);
}
function getTypesBook(Book $book)
{
	echo get_class($book);
}
function getTypesBookAndBooks(Book & Books $book)
{
	echo get_class($book);
}
getTypesBook(new Chemistry());
getTypesBooks(new Biology());
getTypesBookAndBooks(new Math());
//print_r(gettype(new Chemistry()));
//////////////////////////////////////////////////////////















abstract class Animal
{
	abstract public function speak(): string;
}

class Dog extends Animal
{
	public function speak(): string
	{
		return "Woof!";
	}
}

class Cat extends Animal
{
	public function speak(): string
	{
		return "Meow!";
	}
}

class AnimalFactory
{
	public static function createAnimal(string $animalType): Animal
	{
		switch ($animalType) {
			case "Dog":
				return new Dog();
			case "Cat":
				return new Cat();
			default:
				throw new InvalidArgumentException("Invalid animal type");
		}
	}
}


/*
In this example, we have a base class Animal and two subclasses, Dog and Cat, which inherit from it. We also have an AnimalFactory class, which has a create_animal method that takes an animal_type argument and returns an instance of the appropriate subclass.

Here's how you could use this factory:
*/

$factory = new AnimalFactory();
$dog = $factory->createAnimal("Dog");
$cat = $factory->createAnimal("Cat");

print($dog->speak()); # prints "Woof!"
print($cat->speak()); # prints "Meow!"

/*
By using the AnimalFactory class to create instances of Dog and Cat, we don't have to worry about the specific details of how these objects are created. Instead, we just call the create_animal method with the appropriate argument, and the factory takes care of the rest. This can be particularly useful in situations where there are many different types of objects that need to be created, or where the specific type of object to be created is not known until runtime.
*/


// Step 1: Define the Product Interface or Class
interface Shape
{
	public function draw();
}

// Step 2: Create Concrete Product Classes
class Circle implements Shape
{
	public function draw()
	{
		echo "Drawing a Circle\n";
	}
}

class Square implements Shape
{
	public function draw()
	{
		echo "Drawing a Square\n";
	}
}

// Step 3: Create the Factory Interface or Class
interface ShapeFactory
{
	public function createShape();
}

// Step 4: Implement Concrete Factory Classes
class CircleFactory implements ShapeFactory
{
	public function createShape()
	{
		return new Circle();
	}
}

class SquareFactory implements ShapeFactory
{
	public function createShape()
	{
		return new Square();
	}
}

// Client code
function drawShape(ShapeFactory $factory)
{
	$shape = $factory->createShape();
	$shape->draw();
}

// Usage
$circleFactory = new CircleFactory();
$squareFactory = new SquareFactory();

drawShape($circleFactory); // Output: Drawing a Circle
drawShape($squareFactory); // Output: Drawing a Square
