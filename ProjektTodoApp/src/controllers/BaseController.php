<?php

namespace App\controllers;

//BaseController soll nicht instanziert werden, er soll eigentlich nur vererbt werden können 
//--> deswegen abtract, weil können nur vererbt werden

abstract class BaseController{
  protected function view($viewName, $data = []){
    extract($data);
    require "src/views/{$viewName}.php"; //src/views/home.php
  }
}


?>