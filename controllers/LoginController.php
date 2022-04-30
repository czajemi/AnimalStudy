<?php

require_once 'AppController.php'; 

class LoginController extends AppController{

    public function login() {
        return $this->render('login');
    }
}