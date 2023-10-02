<?php
/*
The Mediator pattern is a behavioral pattern that promotes loose coupling between a set of objects by controlling their communication through a mediator object. The mediator object acts as a central hub through which objects communicate with each other, rather than communicating directly with each other. This reduces the dependencies between objects and makes the system more maintainable.

The Mediator pattern is made up of the following components:

Mediator: This is an interface that defines the methods for communicating with the other objects.

Concrete Mediator: This is the implementation of the Mediator interface. It coordinates the communication between the objects.

Colleague: This is an interface that defines the methods for communicating with the mediator.

Concrete Colleague: This is the implementation of the Colleague interface. It communicates with the mediator to exchange information with other colleagues.

To implement the Mediator pattern in PHP, you can start by defining the Mediator interface:*/


interface Colleague
{
    public function setMediator(Mediator $mediator): void;
    public function handleEvent(string $event): void;
}




class ConcreteColleague implements Colleague
{
    private Mediator $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }

    public function handleEvent(string $event): void
    {
        $this->mediator->notify($this, $event);
    }
}


interface Mediator
{
    public function notify(object $sender, string $event): void;
}


class ConcreteMediator implements Mediator
{
    private Colleague $colleague1;
    private Colleague $colleague2;

    public function setColleague1(Colleague $colleague1): void
    {
        $this->colleague1 = $colleague1;
    }

    public function setColleague2(Colleague $colleague2): void
    {
        $this->colleague2 = $colleague2;
    }

    public function notify(object $sender, string $event): void
    {
        if ($sender === $this->colleague1) {
            $this->colleague2->handleEvent($event);
        } else {
            $this->colleague1->handleEvent($event);
        }
    }
}


$mediator = new ConcreteMediator();

$colleague1 = new ConcreteColleague();
$colleague1->setMediator($mediator);

$colleague2 = new ConcreteColleague();
$colleague2->setMediator($mediator);

$mediator->setColleague1($colleague1);
$mediator->setColleague2($colleague2);

$colleague1->handleEvent("event 1"); // Output: Colleague 2 handled event 1
$colleague2->handleEvent("event 2"); // Output: Colleague 1 handled event 2
