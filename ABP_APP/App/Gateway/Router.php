<?php

namespace App\Gateway;

class Router
{

    private static $routes = [];
    private static $middleware_storage  = [];
    private static $group_by = '';
    private $activeRoute  = null;
    public static function middleware(array $middleware): Router
    {
        self::$middleware_storage  = $middleware;

        return new Router();
    }

    private static function setRoute(string $method, string|array $path, $controller): void
    {


        if (!empty(self::$middleware_storage)) {
            self::$routes[]  = new Route($method, $path, self::$middleware_storage, $controller, self::$group_by);
            self::$middleware_storage = []; ///reset middleware for the next route
        } else {
            self::$routes[]  = new Route($method, $path, [], $controller, self::$group_by);
        }
    }
    public static function post(string | array $path, callable|array|null|string $controller = null): Router
    {
        self::setRoute('post', $path, $controller);

        return new Router();
    }

    public static function get(string | array $path, callable | array |null | string $controller = null): Router
    {

        self::setRoute('get', $path, $controller);
        return new Router();
    }

    public static function put(string | array $path, callable|array|null|string $controller = null): Router
    {

        self::setRoute('put', $path, $controller);
        return new Router();
    }

    public static function delete(string | array $path, callable|array|null|string $controller = null): Router
    {

        self::setRoute('delete', $path, $controller);

        return new Router();
    }

    public static function group(string $name, callable $callback): Router
    {


        self::$group_by .= $name;
        $callback(new Router);
        self::$group_by = ''; //#reset it for the nesxt grouping 
        // var_dump(self::$routes);

        return new Router();
    }

    public static function getAllRoutes()
    {
        return self::$routes;
    }



    private function _workOutRoute()
    {
        //$headers = headers_list(); //apache_request_headers();
        // echo "<pre>";
        // print_r($_SERVER);
        // print_r($headers);
        // echo "</pre>";
        //  echo "sdfd";
        $all  =  self::getAllRoutes();
        $macth_register_route  = [];
        foreach ($all as $route) {
            foreach ($route->getPaths() as $register_route) {
                $regex  = '/^\/' . $register_route . '$/'; ///case sensitive
                // echo $regex . "\n";
                $macth_path  = preg_match($regex, $_SERVER['REQUEST_URI'], $macth_register_routes);
                if ($macth_path && $route->getMethod() === strtolower($_SERVER['REQUEST_METHOD'])) {
                    $macth_register_route = [$route, ...$macth_register_routes];
                    $this->activeRoute  = $macth_register_route;
                    break;
                }
            }
        }
        return  $this->activeRoute;
    }

    public function _run()
    { ///called this method at end of the script
        try {
            //code...


            $route_entities =  $this->_workOutRoute();
            if ($route_entities === null) throw new \Error("The route \" " . $_SERVER['REQUEST_URI'] . " \" is not registered  for  " . $_SERVER['REQUEST_METHOD'] . " method ");
            $route  = $route_entities[0];
            $path = $route_entities[1];
            /*$params capture with  :  | {}*/
            $params   = [];
            foreach ($route_entities as $key => $entry) {
                if (!in_array($key, [0, 1])) {
                    $params[]  = $entry;
                }
            }

            if ($route_entities[0]->getMiddleware() && !empty($route_entities[0]->getMiddleware())) {
                foreach ($route_entities[0]->getMiddleware() as $middleware) {
                    $middleware();   # code...
                }
            }

            if (gettype($route_entities[0]->getController()) === 'array') {
                $class  = $route_entities[0]->getController()[0];
                if (class_exists($class)) {
                    if (method_exists($class, $route_entities[0]->getController()[1])) {

                        call_user_func_array([new  $class(), $route_entities[0]->getController()[1]], $params);
                    } else {
                        echo "Method " . $route_entities[0]->getController()[1] . " does not exists" . " in class  " . $class;
                    }
                } else {
                    echo "Class " . $class . "does not exists";
                }
            } else if (gettype($route_entities[0]->getController()) === 'string') {
                $class_method  = explode('@', $route_entities[0]->getController());
                if (class_exists(((object) $class_method[0])::class)) {
                    $class =  $class_method[0];
                    // var_dump(get_class_methods(new $class()));
                    if (method_exists(new $class(), $class_method[1])) {
                        call_user_func_array([new  $class(), $class_method[1]], $params);
                    } else {
                        echo "Method " . $class_method[1] . " does not exists" . " in class  " . $class_method[0];
                    }
                } else {
                    echo "Method " . $class_method[1] . "does not exists";
                }
            } elseif (gettype($route_entities[0]->getController()) === 'object') {
                call_user_func($route_entities[0]->getController());
            }
        } catch (\Throwable $e) {
            echo "<pre>";
            var_dump($e);
            echo "</pre>";
            // echo "ERROR GBANGBA";
        }
    }
}


class Route
{
    private $method;
    private $paths = [];
    private $middleware = [];
    private $controller = null;
    private $group_by;
    function __construct(string $method, string|array $path, array $middleware = [], $controller, $group_by)
    {
        $this->group_by = $group_by;
        $paths  = $this->collectPathIntoArrayWithGroupName($path);
        $regex_path = [];
        foreach ($paths as $path) {
            $regex = preg_replace('/\//', '\\/', trim($path, "/"));
            $regex = preg_replace('/\{([a-zA-Z0-9-_]+)\}|(:[a-zA-Z0-9-_]+)/', '([a-zA-Z0-9-_]+)', $regex);
            $regex_path[]  = $regex;
            $this->controller  = $controller;
        }

        ////each register path has been turn to regex expression to be match with url in browser
        $this->method  = $method;
        $this->paths  =  [...$this->paths, ...$regex_path];

        $this->middleware  = $middleware;
    }

    private function collectPathIntoArrayWithGroupName(string|array $path): array
    {
        if (gettype($path) === 'string') {
            return [$this->group_by . $path];
        }

        if (gettype($path) === 'array') {
            $paths  = [];
            foreach ($path as $eachPath) {
                $paths[] = $this->group_by . $eachPath;
            }
            return $paths;
        }
    }

    function getController()
    {
        return $this->controller;
    }

    function getMethod(): string
    {
        return $this->method;
    }

    function getPaths(): array
    {
        return $this->paths;
    }

    function getMiddleware(): array /*array of function of middleware*/
    {
        return $this->middleware;
    }
}
