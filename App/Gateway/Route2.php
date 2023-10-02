<?php
declare(strict_types =1);
namespace App\Gateway;

class Route3 extends \Exception{
 
	public function __construct()
	{
		$this->list   = null; 
		$this->callcount = 0;

	
	}
    
    public function add($data)
    { 
      return $data;
         
    } 

    public function controller($controller){
          
        $this->add($data);


          print_r($this->list[$this->callcount++]);
	    
    }
	public  function get($url)
	{

	    $data  = [ ];
	    $data['url']  = $url; 
	    $this->add($data);

	    return $this;
      
	}

	function process(){
		print_r($this->list);
	}
    
     
    function __destruct(){
    	echo "<pre> YES";
			print_r($this->list);
		echo "</pre>";
    
    }
}





class Route2
{
    private $routes = [];

    public function add($path, $callback)
    {
        $route = new Router_($path, $callback);
        $this->routes[] = $route;
        return $route;
    }

    public function dispatch($url)
    {
    	echo "<pre>";
    	print_r($this->routes);
    	echo "<pre>";
        foreach ($this->routes as $route) {
            if ($route->match($url)) {
                return $route->call();
            }
        }

        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
    }

    function __destruct(){
      $this->dispatch($_SERVER['REQUEST_URI']);
    }  
}






/////this is each path
class Router_ {
 
    private $path;
    private $callback;
    private $matches = [];
    private $params = [];

    public function __construct($path = null, $callback = null)
    {
        $this->path = trim($path, '/');
        $this->callback = $callback;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'/*the callback is paramMatch in this class*/], $this->path);
           echo $this->path;  
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
        print_r($this->matches);
        return call_user_func_array($this->callback, $this->matches);

    }

    private function paramMatch($match)
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    } 

    // public function with($param, $regex)
    // {
    // 	  print_r($regex);
    //     $this->params[$param] = str_replace('(', '(?:', $regex);
    //     return $this;
    // }
}
