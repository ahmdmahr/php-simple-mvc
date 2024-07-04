<?php

  class Products {
    use Controller;
    public function index(){
      echo "This is the products controller";
      $this->view('products');
    }
  }

  
