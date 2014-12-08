<?php

require 'cli-bootstrap.php';

use Phalcon\DI\Injectable;

class ShowRoutes extends Injectable
{
    public function run()
    {
        $router = $this->router;
        $length = array('pattern' => 0, 'action' => 0, 'method' => 0);
        foreach ($router->getRoutes() as $route) {
            $method = $route->getHttpMethods();
            $pattern = $route->getPattern();
            $path = $route->getPaths();
            $controller = $path['controller'];
            $action = $path['action'];
            
            $length['method'] = max($length['method'], strlen($method));
            $length['pattern'] = max($length['pattern'], strlen($pattern));
            $length['action'] = max($length['action'], strlen($controller . '::' . $action));
        }

        foreach ($router->getRoutes() as $route) {
            $method = $route->getHttpMethods();
            $pattern = $route->getPattern();
            $path = $route->getPaths();
            $controller = $path['controller'];
            $action = $path['action'];
            
            printf(
                '%-'.$length['method'].'s | %-'.$length['pattern'].'s | %s::%s'.PHP_EOL,
                $method,
                $route->getPattern(),
                $path['controller'],
                $path['action']
            );
        }
    }
}

try {
    $task = new ShowRoutes($config);
    $task->run();
} catch(Exception $e) {
    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString();
}
