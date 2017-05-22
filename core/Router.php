<?php 

namespace Core;

class Router
{
    /**
     * All registered routes.
     * 
     * @var array
     */
    public $routes = [
        'GET'  => [],
        'POST' => [],
        'DELETE' => [],
        'PUT' => []
    ];

    /**
     * Load a users route file.
     *
     * @param  string $file 
     */
    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    /**
     * Register a GET route.
     * 
     * @param  string $uri 
     * @param  string $controller 
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register a DELETE route.
     *
     * @param  string $uri
     * @param  string $controller
     */
    public function delete($uri, $controller)
    {
        $this->routes['DELETE'][$uri] = $controller;
    }

    /**
     * Register a PUT route.
     *
     * @param  string $uri        
     * @param  string $controller 
     */
    public function put($uri, $controller)
    {
        $this->routes['PUT'][$uri] = $controller;
    }

    /**
     * Register a POST route.
     * 
     * @param  string $uri        
     * @param  string $controller 
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Remove any numbers from the URI so the route matches.
     *
     * @param  string $uri         
     */
    public function parseUri($uri) 
    {
        return preg_replace("|([0-9]+)(?=[^\/]*)|", "{id}", $uri);
    }

    /**
     * Load the requested URI's associated controller method.
     * 
     * @param  string $uri         
     * @param  string $requestType 
     */
    public function direct($uri, $requestType)
    {
        $id = explode('/', $uri);

        $uri = $this->parseUri($uri);

        if ( ! array_key_exists($uri, $this->routes[$requestType])) {
            throw new \Exception("No route defined for this URI.");
        } 

        $params = explode('@', $this->routes[$requestType][$uri]);

        if (isset($id[1])) {
            $params[] = $id[1];
        } 

        $this->callAction(
            ...$params                      
        );
    }

    /**
     * Load and call the relavent controller action.
     * 
     * @param  string $controller 
     * @param  string $action     
     * @param int $param
     */
    protected function callAction($controller, $action, $param = [])
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if ( ! method_exists($controller, $action)) {
            throw new \Exception("Method {$action} does no exist.");
        }

        if ($param) {
            return $controller->$action($param);
        }

        return $controller->$action();
    }
}