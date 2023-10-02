
<?php
/*
Sure! The SOLID principles are a set of five design principles for writing maintainable and extensible code. Here they are:

Single Responsibility Principle (SRP)
This principle states that a class should have only one reason to change. In other words, a class should have only one responsibility. If a class has multiple responsibilities, it becomes difficult to modify and test the class, and it can also introduce bugs.

In PHP, you can apply SRP by creating small classes that do one thing and do it well. Here's an example:
*/

class Logger
{
    public function log($message)
    {
        // log the message
    }
}

class UserManager
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function createUser($userData)
    {
        // create a new user
        $this->logger->log('User created');
    }

    public function deleteUser($userId)
    {
        // delete the user
        $this->logger->log('User deleted');
    }
}
/*
In this example, the Logger class has a single responsibility: logging messages. The UserManager class has a single responsibility as well: managing users. By separating concerns in this way, it becomes easier to modify and test each class.*/


/*
Open-Closed Principle (OCP)
This principle states that a class should be open for extension but closed for modification. In other words, you should be able to add new features to a class without changing the existing code.

In PHP, you can apply OCP by using interfaces and abstract classes. Here's an example:
*/

interface Shape
{
    public function area();
}

class Rectangles implements Shape
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function draw(): string
    {
        return "";
    }
    public function area()
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function draw(): string
    {
        return "";
    }

    public function area()
    {
        return pi() * $this->radius * $this->radius;
    }
}

/*
In this example, the Shape interface defines a contract for calculating the area of a shape. The Rectangle and Circle classes implement the Shape interface, and each one calculates the area of a shape in its own way. If you wanted to add a new shape, such as a triangle, you could create a new class that implements the Shape interface without modifying the existing code.

*/

/*Liskov Substitution Principle (LSP)
This principle states that if a function expects an object of a certain type, it should be able to work with any subtype of that type without issues. In other words, a derived class should be able to replace its base class without affecting the behavior of the program.

In PHP, you can apply LSP by adhering to the "is-a" relationship between classes. Here's an example:
*/


class Animal
{
    public function eat()
    {
        // eat food
    }
}

class Dog extends Animal
{
    public function bark()
    {
        // bark
    }
    function feedAnimal(Animal $animal)
    {
        $animal->eat();
    }
}



/*
Interface Segregation Principle (ISP):
This principle states that a client should not be forced to depend on interfaces that they do not use. In other words, interfaces should be designed to be as specific as possible for the needs of the client, rather than one large interface that includes many methods that the client may not need.

Example: Suppose we have an interface Animal with methods walk(), swim(), and fly(). If we have a class Penguin that implements Animal, it should not be forced to implement the fly() method, since penguins cannot fly.

That is an interface should contains method that is common to all class implementing it  (implewment only common property)
*/



/*
Dependency Inversion Principle (DIP):
This principle states that high-level modules should not depend on low-level modules, but both should depend on abstractions. Additionally, abstractions should not depend on details, but details should depend on abstractions. This principle is related to the use of dependency injection and inversion of control.

Example: Suppose we have a class Order that depends on a database connection in order to retrieve and store order data. Instead of directly instantiating the database connection within the Order class, we can create an interface DatabaseConnection and pass an instance of this interface to the Order constructor. This way, we can easily swap out different database connection implementations without affecting the Order class.
  High-level module
  Low-Level Module
  Abstraction
*/

/*
Composition Over Inheritance Principle (COI):
This principle states that code should be designed using composition (i.e. building complex objects from simpler ones) rather than inheritance (i.e. inheriting behavior from parent classes). This allows for more flexibility in design and can lead to more maintainable code.
Example: Suppose we have a Bird class and a Fish class, both of which have a method swim(). Instead of creating a new class Penguin that inherits from both Bird and Fish, we can create a separate SwimmingAnimal class that both Bird and Fish can implement, using composition to share the swim() method. This way, we can add other swimming animals in the future without creating a complex inheritance hierarchy.*/


?>



<?php
/*
The Liskov Substitution Principle (LSP) is one of the SOLID principles in object-oriented programming. It states that objects of a superclass should be able to be replaced with objects of a subclass without affecting the correctness of the program.
*/
class Rectangle
{
    protected $width;
    protected $height;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle
{
    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height)
    {
        $this->width = $height;
        $this->height = $height;
    }
}

function printArea(Rectangle $shape)
#this use of parent Rectangle instead of this is what preserve the LisKov's principle
{
    $shape->setWidth(4);
    $shape->setHeight(5);
    echo $shape->area() . "\n";
}

$rectangle = new Rectangle();
$square = new Square();

printArea($rectangle); // prints 20
printArea($square); // prints 25


/*
However, if we try to use the Square object in the printArea function, we get unexpected results because the Square object does not adhere to the Liskov Substitu
*/

function Generator()
{
    yield 'a';
    yield 'b';
    yield 'c';
    yield 'd';
}

$itr = Generator();
foreach ($itr as $val) {
    echo "$val\n";
}
/*
the six relationship (weak, tight couple)
 Dependency (method parameter ----->)       and Association (has a property of an object ______> )
 Interface[Realizeation](is a type -----|>) and Inheritance[generilization] (as a type     ______|>)   
 Aggregation ------------<>                 and Composition   _________<>

*/

function largeData()
{
    // return function () {  ///increase optimaztion 17s without callback is 35s
    for ($i = 0; $i  < 1_000; $i++) {
        yield $i;
    }
    // };
}

$s   = microtime(true);

foreach (largeData() as $i) {
    echo $i . "\n";
}

$e   = microtime(true);
echo $e - $s;
