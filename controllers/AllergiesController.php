<?php

require_once 'AppController.php';

class AllergiesController extends AppController{

    public function allergies() {
        return $this->render('allergies');
    }
}