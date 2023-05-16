<?php

class EventRouter
{
    private array $routes;

    public function register(string $path, callable|array $action)
    {
        $this->routes[$path] = $action;
    }

    public function resolve()
    {
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            call_user_func_array([new eventController(), "wrongEventPagePath"], []);
        }
        else{
            $eventPath = explode("/",$_SERVER['REQUEST_URI'])[2];
            var_dump($eventPath);
            if(!is_numeric($eventPath))
            {
                $this->register("/" . $eventPath, ['EventController', $eventPath]);
                $this->resolvePage($eventPath);
            }
            else{
                //Generate token and send request to api to know if the event exist
                $url = "http://localhost/EventMap/API/event/readSingle.php?EventId=" . $eventPath;
                $token = GenerateToken([]);
                $event = SendRequestToAPI($token, $url);


                if($event){ 
                    // passer event en référence pour pouvoir y acceder dans la page event.php
                    call_user_func_array([new eventController(), "eventPage"], ['event' => $event]);               
                }
                else{
                    call_user_func_array([new eventController(), "eventPageNotFound"], []);
                }
                
            }       
        }    
    }

    private function resolvePage(string $uri){
        $path = explode('?', "/" . $uri)[0];
        $action = $this->routes[$path] ?? null;

        
        if(is_callable($action)){
            return $action();
        }


        if(is_array($action)){
            
            [$className, $method] = $action;
            //$reflectionMethod = new ReflectionMethod($className, $method);
            if(class_exists($className) && method_exists($className, $method)){
                
                $class = new $className();
                
                return call_user_func_array([$class, $method], []);
            }
        }
        require_once '../Pages/Views/Error404.php';
        throw new RouteNotFoundException();
    }
}

?>