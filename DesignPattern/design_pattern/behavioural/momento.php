<?php

/*
The Memento pattern is a behavioral design pattern that allows an object to capture and restore its internal state. It is useful when you need to save and restore the state of an object at a certain point in time, or when you need to provide undo/redo functionality in your application.


The Memento pattern is based on three key elements:

Originator: the object whose state needs to be saved and restored.
Memento: an object that stores the state of the Originator at a certain point in time.
Caretaker: an object that is responsible for storing and managing Mementos.

The Memento pattern allows the Originator to save its internal state to a Memento object and restore its state from a Memento object when needed. The Memento object is typically created and managed by the Caretaker object, which can store a list of Mementos and provide undo/redo functionality by restoring previous states.
*/

class Memento {
    private $state;

    public function __construct($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }
}

class Originator {
    private $state;

    public function setState($state) {
        echo "Originator: Setting state to $state\n";
        $this->state = $state;
    }

    public function saveStateToMemento() {
        echo "Originator: Saving state to Memento\n";
        return new Memento($this->state);
    }

    public function restoreStateFromMemento(Memento $memento) {
        $this->state = $memento->getState();
        echo "Originator: Restoring state from Memento: {$this->state}\n";
    }
}

class Caretaker {
    private $mementos = [];

    public function addMemento(Memento $memento) {
        $this->mementos[] = $memento;
    }

    public function getMemento($index) {
        return $this->mementos[$index];
    }
}

// Usage example
$originator = new Originator();
$caretaker = new Caretaker();

$originator->setState("State 1");
$originator->setState("State 2");
$caretaker->addMemento($originator->saveStateToMemento());

$originator->setState("State 3");
$caretaker->addMemento($originator->saveStateToMemento());

$originator->setState("State 4");
$originator->restoreStateFromMemento($caretaker->getMemento(1));
