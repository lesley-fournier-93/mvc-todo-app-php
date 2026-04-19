<?php

namespace App\controllers;
use App\controllers\BaseController;
use App\models\TodoModel;
use App\components\TodoCard\TodoCard;

class HomeController extends BaseController{
  public function index(){
    $todoModel = new TodoModel();
    $todos = $todoModel->getTodos();


    $cards = [];


    foreach ($todos as $todo) {
      $CardObj = new TodoCard($todo["name"], $todo["status"], $todo["descr"], $todo["id"]);
      $card = $CardObj->createCard();
      array_push($cards, $card);
    }

  
    $this->view("home", ["cards" => $cards]);
  }



  public function posttodo(){
    $todoModel = new TodoModel();

    // 1. Prüfen, ob der "Create"-Button geklickt wurde
    if (isset($_POST["create"])) {
        $name = trim($_POST["name"] ?? '');
        $desc = trim($_POST["desc"] ?? '');

        // 2. Die entscheidende Sperre: Nur wenn beides NICHT leer ist
        if (!empty($name) && !empty($desc)) {
            $todoModel->insertTodo($name, $desc);
            // Nach Erfolg: Seite neu laden, um POST-Daten zu löschen (PRG-Pattern)
            header("Location: /Grundlagen/ProjektTodoApp/");
            exit();
        } else {
            $error = "Bitte füllen Sie beide Felder aus!";
        }
    }

    // Speicher das neue Todo ein
  

    if(array_key_exists("done", $_POST)){
      $todoModel->updateTodo(1 , $_POST["done"]);
    }

    if(array_key_exists("pending", $_POST)){
      $todoModel->updateTodo(-1 , $_POST["pending"]);
    }

    if(array_key_exists("create", $_POST)){
      $todoModel->insertTodo($_POST["name"], $_POST["desc"]);
    }

    if(array_key_exists("delete", $_POST)){
      $todoModel->deleteTodo($_POST["delete"]);
    }

    
    $todos = $todoModel->getTodos();
    $cards = [];
    foreach ($todos as $todo) {
      $CardObj = new TodoCard($todo["name"], $todo["status"], $todo["descr"], $todo["id"]);
      $card = $CardObj->createCard();
      array_push($cards, $card);
    }

  
    $this->view("home", ["cards" => $cards]);
  }




}