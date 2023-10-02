<?php
/*
Introduction to the Command Pattern
The Command pattern is a behavioral design pattern that allows you to 
'encapsulate a request as an object', 
thereby letting you parameterize clients with different requests, queue or log requests, and support undoable operations. This pattern is useful when you have a system that needs to execute commands or perform actions on a set of objects in a flexible and extensible way.

it support do and undo in software
*/
interface Command
{
    public function execute(): void;
}

/*
We can then create a concrete Receiver class that will perform the actions:

*/
class Receiver
{
    public function doAction(string $message): void
    {
        echo "Receiver: {$message}\n";
    }
}

/*
Next, we can create a concrete Command class that will encapsulate the request:
*/
class ConcreteCommand implements Command
{
    private $receiver;
    private $message;

    public function __construct(Receiver $receiver, string $message)
    {
        $this->receiver = $receiver;
        $this->message = $message;
    }

    public function execute(): void
    {
        $this->receiver->doAction($this->message);
    }
}




class Invoker
{
    private $commands = [];
    // use association
    public function setCommand(Command $command): void
    {
        $this->commands[] = $command;
    }

    public function executeCommands(): void
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}


/*
command is a class that consist of messenger and message
invoker consist of commnand

*/
// create the Receiver
$receiver = new Receiver();

// create the ConcreteCommand
$command = new ConcreteCommand($receiver, "Hello, World!");

// create the Invoker
$invoker = new Invoker();
$invoker->setCommand($command);

// execute the commands
$invoker->executeCommands();


///////involker => commander =>messager =>message
////////////////////////////////////////////////////////////////////////////////////////
