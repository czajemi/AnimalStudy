<?php

require_once 'AppController.php'; 

class DescriptionController extends AppController{

    public function description() {
        return $this->render('description');
    }
}