<?php

class App{

    private $controller = 'Home';
    private $method = 'index';

    private function spiltURL(){
        // if $_GET['url'] doesn't exist we set $URL to home
        $URL = $_GET['url'] ?? 'home';

        // I used trim to remove last trailing / because it will add empty item to array

        $URL = explode("/",trim($URL,"/"));

        return $URL;
    }
    
    public function loadController(){


        $URL = $this->spiltURL();

        // select controller
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($URL[0]);
        }
        else{
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        // show($URL);

        // below is equal to => $controller = new Home; 
        $controller = new $this->controller;


        // select method
        if(!empty($URL[1])){
           if(method_exists($controller,$URL[1])){
              $this->method = $URL[1];
            //   unset($URL[0]);
            //   unset($URL[1]);
           }
        }


        // show($this->method);
        call_user_func_array([$controller,$this->method],$URL);
      }

  }