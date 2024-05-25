<?php
  // check if the file doesn't exist then it will load it (autolaoder).
  spl_autoload_register(function($className){

    $fileName = "../app/models/". ucfirst($className).".php";

    require $fileName;
    
  });
  require 'config.php';
  require 'functions.php';
  require 'Database.php';
  require 'Model.php';
  require 'Controller.php';
  require 'App.php';

