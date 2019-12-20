<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    public function index(){

        if(isLoggedIn()){
          redirect('posts');
        }
        $data =  ['title' => 
        'Welcome to Index Page'];

        $this->view('pages/index', $data);
    }

    public function about(){
        $data =  ['title' => 
        'Welcome to About Page'];

        $this->view('pages/about', $data);
    }
    
  }