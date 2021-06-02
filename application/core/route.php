<?php
class Route {
    static function start() {
        $controllerName = 'mAin';
        $actionName = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if(!empty($routes[1])) {
            $controllerName = $routes[1];

        }
        if(!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $modelName = "model-".$controllerName;
        $controllerFileName = "controller-".$controllerName;
        $actionName = "action".ucfirst(strtolower($actionName));




        $modelFile = strtolower($modelName).".php";
        $modelPath = "application/models/".$modelFile;


        if(file_exists($modelPath)) {
            include $modelPath;
        }

        $controllerFile = strtolower($controllerFileName).".php";
        $controllerPath = "application/controllers/".$controllerFile;

        if(file_exists($controllerPath)) {
            include $controllerPath;
        }
        else {
            Route::ErrorPage404();
        }


        $controllerName = "controller".ucfirst(strtolower($controllerName));
        $controller = new $controllerName;

         if(method_exists($controller, $actionName)) {
             $controller->$actionName();

         }
         else {
             Route::ErrorPage404();
         }

    }
    function ErrorPage404() {
        $host = "http://".$_SERVER['HTTP_HOST'].'/';
        /*header('HTTP/1.1 404 Not Found');*/
        /*header("Status 404 Not Found");*/
        header('Location:'.$host.'404');
    }

}
