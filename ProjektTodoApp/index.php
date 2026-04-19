<?php

#https://www.php-fig.org/psr/psr-4/

require_once("autoloader.php");

use App\router\Router;
use App\controllers\HomeController;


$router = new Router();
$router->add("GET", "/Grundlagen/ProjektTodoApp/", "HomeController@index"); //neue Route zu unseren Router geaddet
$router->add("POST", "/Grundlagen/ProjektTodoApp/", "HomeController@posttodo"); 


$router->dispatch();

?>