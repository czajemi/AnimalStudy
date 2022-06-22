<?php

require_once 'AppController.php';

class VaccinationsController extends AppController{

    public function vaccinations() {
        return $this->render('vaccinations');
    }
}