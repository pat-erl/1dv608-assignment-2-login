<?php

namespace controller;

class Login {
    
    private $login;
    
    public function __construct($modelLogin) {
        $this->login = $modelLogin;
    }
    
    public function compareLogin($userName, $password) {
  
        if($userName == 'Patrik' && $password == 'Losenord') {
            return true;
        }
        else {
            return true;
        }
    }
}