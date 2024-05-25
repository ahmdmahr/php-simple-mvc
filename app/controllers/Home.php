<?php

// line below can be removed but i don't know why it still works tho. 
// require "../src/Controller.php";
// i know why now :D

class Home 
{
  use Controller;
  
  public function index($a = '', $b = '', $c = '')
  {

    // $user =  new User();
    

    // show($user->getAll());
    // $user->insert(['name'=>"ahmad",'email'=>"ahmad@gmail.com",'password'=>"ahmad@Qwer"]);
    // $user->update(5,['name'=>"c",'email'=>"c@gmail.com",'password'=>"123"]);
    // $user->delete(11);


    // show($user->query("SELECT * FROM  users"));

    // show($a);
    // show($b);
    // show($c);


    show('from the index function');

    echo "This is the home controller";

    $this->view('home');
  }

  public function edit($a = '', $b = '', $c = ''){

    // show($a);
    // show($b);
    // show($c);

    show('from the edit function');
    $this->view('home');
  }
}
