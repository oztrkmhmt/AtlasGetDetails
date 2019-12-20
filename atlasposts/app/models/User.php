<?php
  
  //require_once(APPROOT . '/config/config.php');

  class User {
    private $db;
    private $url = REQUEST_URL;
    private $detailsURL = LOGINDETAILS_URL ;

    public function __construct(){
      $this->db = new Database;

      }


    // Get User Hash Code
    public function GetUserHashCode(){

        $hashcode = array("username" => $_POST['username'], "password" => $_POST['password']);                                                                    
        $hashcode_string = json_encode($hashcode);
         
        $ch = curl_init($this->url);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT,
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hashcode_string);

        $result=curl_exec ($ch); //execute
        curl_close ($ch);
        $userDetail = (json_decode($result, true));

        $_SESSION['userDetail']  = $userDetail;
    
      }

      // Get User Details
      public function GetLoginDetails($data){
        echo "<pre>";
        var_dump($_SESSION['userDetail']['hashCode']);
        
        $userDetails = array("username" => $data['username'], "hashcode" => $_SESSION['userDetail']['hashCode']);                                                                    
        $userDetails_string = json_encode($userDetails);
         
        $ch = curl_init($this->detailsURL);
  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT,
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $userDetails_string);
  
  
        $resultUserDetails=curl_exec ($ch); //execute
        curl_close ($ch);
        $details=(json_decode($resultUserDetails, true));
        var_dump($details);
        echo "</pre>";
    }

    // Get User Details
    public function GetCustomerDetails($data){
      echo "<pre>";
     
      $_SESSION['kimlikTipi']  = "0";
      $_SESSION['kimlikNo']  = "11906349834";
      
      $customerDetails = array("kimlikTipi" => $_SESSION['kimlikTipi'], "kimlikNo" => $_SESSION['kimlikNo']);                                                                    
      $customerDetails_string = json_encode($customerDetails);
       
      $customerHeader = array("username" => $data['username'], "hashcode" => $_SESSION['userDetail']['hashCode']);                                                                    
      $customerHeader_string = json_encode($customerHeader);

      $ch = curl_init($this->detailsURL);

      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($ch, CURLOPT_USERAGENT,
      "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $customerDetails_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $customerHeader_string);
    

      $resultCustomerDetails=curl_exec ($ch); //execute
      curl_close ($ch);
      $ctDetailResult=(json_decode($resultCustomerDetails, true));
      var_dump($ctDetailResult);
      echo "</pre>";
  }

  }