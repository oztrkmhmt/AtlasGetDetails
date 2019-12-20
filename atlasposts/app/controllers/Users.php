<?php
  class Users extends Controller {

    public function __construct(){
      
      $this->userModel = $this->model('User');
    }
  
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'username_err' => '',
          'password_err' => '',      
        ];

        // Validate Username
        if(empty($data['username'])){
          $data['username_err'] = 'Lütfen kullanıcı adını giriniz!';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Lütfen Parolayı giriniz!';
        }

     

      // No errors
      if(empty($data['username_err']) && empty($data['password_err'])){

        $main = $this->userModel->GetUserHashCode();

        $data = [
          'main' => $main
        ];
  
        $this->view('users/hashcode', $data);


      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
              
    } else {
      // Init data
      $data =[    
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => '',        
      ];

    // Load view
    $this->view('users/login',$data);
  }
}

    public function main(){

       // Check for POST
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'username_err' => '',
          'password_err' => '',      
        ];

        // Validate Username
        if(empty($data['username'])){
          $data['username_err'] = 'Lütfen kullanıcı adını giriniz!';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Lütfen Parolayı giriniz!';
        }

      // No errors
      if(empty($data['username_err']) && empty($data['password_err'])){

        if($this->userModel->GetUserHashCode($data)){
          $this->view('users/hashcode');
        }else{
          $this->userModel->GetCustomerDetails($data);
        }
        
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
              
    } else {
      // Init data
      $data =[    
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => '',        
      ];

    // Load view
    $this->view('users/login',$data);
    }

  }


    public function createUserSession($user){
      $_SESSION['user_id'] = $user->$_POST['user_id'];
      redirect('main');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      session_destroy();
      redirect('users/login');
    }
  }