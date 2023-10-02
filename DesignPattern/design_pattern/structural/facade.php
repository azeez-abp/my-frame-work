 <?php

    /**
     * Facade is interface for complex stystem (many object, each  as one prop to the instance of each class)
     * we need classes to the object
     * we need facade
     */

    // classes start
    class Engine
    {
        public function start()
        {
            return "Engine started\n";
        }

        public function running()
        {
            return "Engine running\n";
        }

        public function stop()
        {
            return "Engine stopped\n";
        }
    }

    class Brake
    {
        public function apply()
        {
            return "Brake applied\n";
        }

        public function release()
        {
            return "Brake released\n";
        }
    }

    class Battery
    {
        public function charge()
        {
            return "Battery charged\n";
        }

        public function discharge()
        {
            return "Battery discharged\n";
        }
    }
    // classes end
    // Facade start
    class Car
    {
        private $engine;
        private $brake;
        private $battery;

        public function __construct()
        {
            $this->engine = new Engine();
            $this->brake = new Brake();
            $this->battery = new Battery();
        }

        public function start()
        {
            $output = $this->battery->charge();
            $output .= $this->engine->start();
            $output .= $this->brake->apply();
            return $output;
        }
        public function move()
        {
            $output = $this->engine->running();
            $output .= $this->battery->charge();
            $output .= $this->brake->release();
            return $output;
        }

        public function stop()
        {
            $output = $this->brake->apply();
            $output .= $this->engine->stop();
            $output .= $this->battery->discharge();
            return $output;
        }
    }

    // Client code
    $car = new Car();
    echo $car->start();
    echo $car->move();
    echo $car->stop();


/*
In this example, the Engine, Brake, and Battery classes are the Subsystem, which provides the functionality of starting and stopping the car. The Car class is the Facade, which provides a simplified interface to the Subsystem.

The client code creates an instance of the Facade object, and then calls its start() and stop() methods. The Facade object in turn interacts with the Subsystem to provide the required functionality.

In this example, the Car class provides a simplified interface to the Subsystem by encapsulating the functionality of starting and stopping the car, and hiding the complexity of the Subsystem from the client code.*/