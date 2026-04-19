<?php

namespace App\router;//src/router

//  MVP Pattern Router = kümmert sich darum, eine eingegebene URL aufzudrösseln und zu entscheiden,
// welcher Controller mit, welcher Controller-Funktionen soll den geladen werden
// => Kümmert sich außerdem darum, dass wir Routen überhaupt festlegen können 

#ACHTUNG: Abspeichern nicht auswendig lernen!
// - wir haben ein Array
// - dort haben eine public function add = Methode (speichert Routen in Array hinein)
// - dann haben wir eine Methode formatRoute
// => formatiert uns eine Route mit Routenparametern
// dann machen wir noch eine dispatch Funktion = main Funktion
// => die sucht eine Route die eingegeben worden ist, in unserem Array private $routes
// wenn Route gefunden wurde, dann holt sie den Controller und die Methode aus dieser Route raus (wird eingespeichert)
// und entscheidet dann, wenn etwas gefunden worden ist, welcher Controller geladen wird unf welche Funktion + das wird dann aufgerufen



class Router
{

  private $routes = [];


  public function add($method, $path, $controllerAction)
  {
    $this->routes[$method][$path] = $controllerAction;
  }


  public function dispatch()
  {
    $method = $_SERVER["REQUEST_METHOD"]; //damit kriege ich HTTP Methoden z.B. get oder post
    $path = $_SERVER["REQUEST_URI"];  //gibt Uri aus, mit welchem Path meine URL aufgerufen worden ist

    foreach ($this->routes[$method] ?? [] as $route => $controllerAction) {
      if (preg_match($this->formatRoute($route), $path, $matches)) {
        array_shift($matches);
        list($class, $action) = explode("@", $controllerAction); 
        $class = "App\controllers\\$class"; 
        if (class_exists($class) && method_exists($class, $action)) {
          return call_user_func_array([new $class, $action], array_slice($matches,1));
        }
      }
    }

    http_response_code(404);
    echo "404 Not Found";
  }



  private function formatRoute($route)
  { //Funktion sorgt dafür, dass ich Routen-Parameter kriege(sorgt dafür das dynamische Routen funktionieren)
    $route = preg_replace('/\{([^\/]+)\}/', '(?P<$1>[^/]+)', $route);
    return "#^$route$#";
  }
}


?>