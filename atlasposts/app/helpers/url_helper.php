<?php
  // Simple page redirect
  function redirect($page, $data= []){
    header('location: ' . URLROOT . '/' . $page);
  }
