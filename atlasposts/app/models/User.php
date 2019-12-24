<?php
  
  require_once(APPROOT . '/helpers/users_helper.php');

  class User {
    private $db;
    private $url = REQUEST_URL;
    private $detailsURL = LOGINDETAILS_URL ;
    private $customerDetailsURL = CUSTOMERDETAILS_URL;
    private $kimlikTipi = kimlikTipi;
    private $kimlikNo = kimlikNo;

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

        $userDetails = array("username" => $data['username'] , "hashcode" => $_SESSION['userDetail']['hashCode']);                                                                    
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
        $_SESSION['logindetails']  = $details;
    }

    // Get User Details
    public function GetCustomerDetails($data){
      echo "<pre>";
      
      $customerDetails = array("kimlikTipi" => $this->kimlikTipi, "kimlikNo" => $this->kimlikNo);                                                                    
      $customerDetails_string = json_encode($customerDetails);

      var_dump($customerDetails_string);

      $ch = curl_init($this->customerDetailsURL);

      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($ch, CURLOPT_USERAGENT,
      "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $customerDetails_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "username:" .$data['username'],
        "hashcode:" .$_SESSION['userDetail']['hashCode'],
        "Content-Type : application/x-www-form-urlencoded"
      ));
      
    
      $resultCustomerDetails=curl_exec ($ch); //execute
      curl_close ($ch);
      $ctDetailResult=(json_decode($resultCustomerDetails, true));
      var_dump($ctDetailResult);
      echo "</pre>";
      $_SESSION['customerDetails'] = $ctDetailResult;


    }


  }