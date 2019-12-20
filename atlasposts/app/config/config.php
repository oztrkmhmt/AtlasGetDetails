<?php

  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'atlasposts');


  //if (!isset($_SESSION)) {
  //  session_start();
  //} 


  //cURL Request URL
  define('REQUEST_URL','http://10.1.0.16:8080/AwsLocalRestService-V1.0/services/aws/GetLoginHash');

  //cURL Request User Details
  define('LOGINDETAILS_URL','http://10.1.0.16:8080/AwsLocalRestService-V1.0/services/aws/GetLoginDetails');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/atlasposts/');
  // Site Name
  define('SITENAME', 'atlasposts');


