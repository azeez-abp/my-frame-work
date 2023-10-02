<?php

class Singleton {
    private static $instance;

    private function __construct() {
        // prevent direct object creation
    }

    public static function getInstance(): Singleton {
        if (!self::$instance) {
            self::$instance = new self();
        }else{
            echo "instance exit";
        }
        return self::$instance;
    }

    public function someBusinessLogic() {
        echo"One bsiness login unit";
    }
}
// to use this single instance we will set it as property of a class which we can call from page to page
$s = Singleton::getInstance()->someBusinessLogic();

$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

if ($singleton1 === $singleton2) {
    echo "Only one instance of Singleton exists";
} else {
    echo "Singleton has multiple instances";
}

/*
In this example, we first call the getInstance method to create a new instance of the Singleton class, and store it in the $singleton1 variable. We then call the getInstance method again, and store the result in $singleton2. Since getInstance always returns the same instance of the Singleton class, $singleton1 and $singleton2 are actually references to the same object.

This allows us to ensure that only one instance of the Singleton class exists, and that all references to that class point to the same object. This can be useful in situations where you want to ensure that there is only one instance of a class in the entire application, such as when working with a database connection or a configuration object*/