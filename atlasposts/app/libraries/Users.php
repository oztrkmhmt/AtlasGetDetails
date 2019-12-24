<?php

class SessionHelper{
    private $username;
    public function setSession(){
        $username = $_SESSION['username'] ;
    }
}