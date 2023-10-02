<?PHP
interface Observer {
    public function update(): void;
}

interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}


/*


This interface defines three methods for the subject: attach(), detach(), and notify(). The attach() method adds an observer to the list of dependents, the detach() method removes an observer from the list, and the notify() method notifies all observers of any state changes. The Observer interface defines a single method, update(), which will be called by the subject when its state changes.

Next, let's create a concrete subject class that implements the Subject interface:
*/

class ConcreteSubject implements Subject {
    private array $observers = [];

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}


/*
This concrete subject class maintains a list of observers and implements the three methods defined in the Subject interface. The attach() method adds an observer to the list, the detach() method removes an observer from the list, and the notify() method notifies all observers by calling their update() methods.

Finally, let's create a concrete observer class that implements the Observer interfac*/


class ConcreteObserver implements Observer {
    private ConcreteSubject $subject;

    public function __construct(ConcreteSubject $subject) {
        $this->subject = $subject;
    }

    public function update(): void {
        // Do something when the subject's state changes
    }
}




/*
This concrete subject class maintains a list of observers and implements the three methods defined in the Subject interface. The attach() method adds an observer to the list, the detach() method removes an observer from the list, and the notify() method notifies all observers by calling their update() methods.

Finally, let's create a concrete observer class that implements the Observer interface:
*/


$subject = new ConcreteSubject();
$observer1 = new ConcreteObserver($subject);
$observer2 = new ConcreteObserver($subject);

$subject->attach($observer1);
$subject->attach($observer2);

$subject->notify();



interface Events{


 function addEvent(string $name,array $data);
 function listen(string $name, callable $callback);
}

class EventObject{
 
 function __construct($data){
    $this->data  = $data;
 }

 function listen($callback){
    return $callback( $this->data );
 }

}

class Event implements Events{

  private $event  = [];

 function addEvent(string $name,array $data){
     if (!array_key_exists($name,$this->event)) {
       $this->event[$name]  = new  EventObject($data) ;
     }
 }

 function listen(string $name, callable $callback){
      if(isset($this->event[$name])){
         $this->event[$name]->listen($callback);
      }
 }

}

$newEvent  = new Event();
$newEvent->addEvent('notify',[]);

$newEvent->listen('notify',function($data){
    echo "I am listen";
    print_r($data);
});

/*
Introduction to the Observer Pattern
The Observer pattern is a behavioral design pattern that allows you to define a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically

This pattern is useful when you have a group of objects that need to be notified of changes to another object, but you don't want the objects to be tightly coupled.*/

interface Observer {
    public function update(Subject $subject): void;
}

class Subject {
    private $observers = [];

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        foreach ($this->observers as $key => $value) {
            if ($value === $observer) {
                unset($this->observers[$key]);
                break;
            }
        }
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function doSomething(): void {
        // do something that changes the state of the Subject

        // notify the observers
        $this->notify();
    }
}


class ConcreteObserver implements Observer {
    private $subjectState;

    public function update(Subject $subject): void {
        $this->subjectState = $subject->getState();
        echo "ConcreteObserver: State of Subject has changed to {$this->subjectState}\n";
    }
}


// create the Subject
$subject = new Subject();

// attach the observer
$observer = new ConcreteObserver();
$subject->attach($observer);

// do something that changes the state of the Subject
$subject->doSomething();
