<?php
//ABFPS
abstract class Prototype {
    protected $property1;
    protected $property2;

    public function __construct($property1, $property2) {
        $this->property1 = $property1;
        $this->property2 = $property2;
    }

    abstract public function clone(): Prototype;
}

class ConcretePrototype extends Prototype {
    public function clone(): Prototype {
        return new ConcretePrototype($this->property1, $this->property2);
    }
}

$prototype = new ConcretePrototype("property1", "property2");
$clone = $prototype->clone();
 

/*
In this implementation, we have an abstract Prototype class with two properties (property1 and property2) and a constructor that sets these properties. We also have an abstract clone method, which returns a new instance of the current object.

We then have a ConcretePrototype class that extends Prototype, and overrides the clone method to create a new instance of itself, with the same property values as the original.

Finally, we create an instance of ConcretePrototype, and call its clone method to create a new instance with the same property values.

Here's an example of how you could use the Prototype pattern to create a new object with the same property values as an existing one, but with a few differences:*/

$prototype = new ConcretePrototype("property1", "property2");
$clone = $prototype->clone();
$clone->property1 = "new value";
 
 /*

 In this example, we first create a ConcretePrototype instance with the property values "property1" and "property2". We then call its clone method to create a new instance with the same property values.

We then modify the property1 value of the new instance to "new value". Since the original instance and the new instance share the same property values, but are different objects, modifying the property value of the new instance does not affect the*/