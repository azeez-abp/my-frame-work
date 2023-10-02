In PHP, you can create a route class to handle URL routing in your web application. Here's an example implementation:

class Route
{
    private $path;
    private $callback;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callback)
    {
        $this->path = trim($path, '/');
        $this->callback = $callback;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);

        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call()
    {
        return call_user_func_array($this->callback, $this->matches);
    }

    private function paramMatch($match)
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    public function with($param, $regex)
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }
}


This Router class has two main methods:

add: This method takes a path and a callback function, creates a new Route object, adds it to the $routes array, and returns the Route object.
dispatch: This method takes a URL as an argument and tries to find a matching route. If it finds a matching route, it calls the call method on that route. If it doesn't find a matching route, it returns a 404 error.


$router = new Router();

$router->add('/', function () {
    echo 'Hello, World!';
});

$router->add('/user/:id', function ($id) {
    echo 'User ID: ' . $id;
})->with('id', '[0-9]+');

$router->dispatch($_SERVER['REQUEST_URI']);
``

