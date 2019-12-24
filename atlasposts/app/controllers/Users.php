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

        if(empty($data['username'])){
          $data['username_err'] = "Kullanıcı adı boş bırakılamaz !";
        }

        if(empty($data['password'])){
          $data['password_err'] = "Kullanıcı parola boş bırakılamaz !";
        }


      // No errors
      if(empty($data['username_err']) && empty($data['password_err'])){
          if($this->userModel->GetUserHashCode($data)){
          }elseif(isset($_SESSION['userDetail']['errorMessage'])){
            flash('hata_yakalandi',  $_SESSION['userDetail']['errorMessage']);
            $this->view('users/login',$data);
          }else{
                   
            $this->view('users/hashcode',$data);
  
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
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_name'] = $user->username;
      $_SESSION['user_password'] = $user->password;
      redirect('pages/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_password']);
      session_destroy();
      redirect('users/login');
    }
    
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      }else{
        return false;
      }
    }
  }