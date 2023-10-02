<?php

interface State {
    public function handle(): void;
}

interface Context {
    public function transitionTo(State $state): void;
}

class StateA implements State {
    private Context $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "Handling State A.\n";
        $this->context->transitionTo(new StateB($this->context));
    }
}

class StateB implements State {
    private Context $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "Handling State B.\n";
        $this->context->transitionTo(new StateA($this->context));
    }
}

class ContextImpl implements Context {
    private State $state;

    public function __construct() {
        $this->transitionTo(new StateA($this));
    }

    public function transitionTo(State $state): void {
        echo "Context: Transitioning to " . get_class($state) . ".\n";
        $this->state = $state;
    }

    public function request(): void {
        $this->state->handle();
    }
}

$context = new ContextImpl();
$context->request(); // Output: Handling State A
$context->request(); // Output: Handling State B
$context->request(); // Output: Handling State A

exit;


interface State {
    public function handle(): void;
}

interface Context {
    public function setState(State $state): void;
}

/*
This interface defines a State interface with a single method handle() and a Context interface with a single method setState(). The State interface defines the behavior of each possible state, while the Context interface defines the methods that can be used to change the state of the context.

Next, let's create some concrete state classes that implement the State interface:

php
Copy code
*/
class StateA implements State {
    private Context $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "Handling State A\n";
        $this->context->setState(new StateB($this->context));
    }
}

class StateB implements State {
    private Context $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "Handling State B\n";
        $this->context->setState(new StateA($this->context));
    }
}
/*
These concrete state classes implement the State interface and define the behavior for each possible state of the context. The Context object is passed to the constructor of each state class, so that it can call the setState() method on the context to change its state.

Finally, let's create a concrete context class that implements the Context interface:

*/
class ConcreteContext implements Context {
    private State $state;

    public function __construct(State $state) {
        $this->state = $state;
    }

    public function setState(State $state): void {
        $this->state = $state;
    }

    public function handle(): void {
        $this->state->handle();
    }
}
/*
This concrete context class maintains a reference to the current state object and implements the setState() and handle() methods defined in the Context interface. The setState() method changes the current state of the context, while the handle() method calls the handle() method of the current state.

Here's an example of how to use these classes:

php
Copy code
*/
$context = new ConcreteContext(new StateA($context));
$context->handle(); // Output: Handling State A
$context->handle(); // Output: Handling State B
$context->handle(); // Output: Handling State A
/*
In this example, we create a ConcreteContext object with an initial state of StateA. We call the handle() method on the context, which calls the handle() method of the StateA object. The StateA object then calls the setState() method on the context to switch its state to StateB. We call handle() twice more, which switches the state back to StateA and then to StateB again.





Introduction to the State Pattern
The State pattern is a behavioral design pattern that allows an object to change its behavior based on its internal state
is pattern is useful when you have an object that can be in different states, and its behavior needs to change based on its state. The State pattern allows you to define a set of states and their corresponding behaviors, and switch between them at runtime


Suppose we have a Context class that represents an object whose behavior needs to change based on its state. We have a State interface that defines a set of methods that will be implemented by concrete state classes:
*/



interface State {
    public function handle(): void;
}
/*
We can then create a concrete State class for each possible state of the Context object
*/
class ConcreteStateA implements State {
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "State A: Handling request.\n";
        $this->context->setState(new ConcreteStateB($this->context));
    }
}

class ConcreteStateB implements State {
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function handle(): void {
        echo "State B: Handling request.\n";
        $this->context->setState(new ConcreteStateA($this->context));
    }
}

/*
Next, we can create the Context class that maintains the current state and delegates behavior to the current state:*/

class Context {
    private $state;

    public function __construct(State $state) {
        $this->setState($state);
    }

    public function setState(State $state): void {
        $this->state = $state;
    }

    public function getState(): State {
        return $this->state;
    }

    public function request(): void {
        $this->state->handle();
    }
}




// create the Context with an initial state of ConcreteStateA
$context = new Context(new ConcreteStateA($context));

// call the request method, which delegates behavior to the current state
$context->request();

// call the request method again, which delegates behavior to the next state
$context->request();
