<?php

require_once 'AppController.php';

class EditController extends AppController{

    public function edit() {
        return $this->render('edit');
    }
}