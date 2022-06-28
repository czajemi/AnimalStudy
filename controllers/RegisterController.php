<?php

require_once 'AppController.php';

class RegisterController extends AppController{

    public function register() {
        return $this->render('register');
    }
}