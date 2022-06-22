<?php

require_once 'AppController.php';

class DewormingsController extends AppController{

    public function dewormings() {
        return $this->render('dewormings');
    }
}