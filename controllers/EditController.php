<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Pet.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/PetRepository.php';

class EditController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/public/uploads/';

    private $message=[];
    private $petRepository;

    public function __construct()
    {
        parent::__construct();
        $this->petRepository = new PetRepository();

    }

    public function description() {
        $pet=$this->petRepository->getYourPet();
        return $this->render('description', ['pet' => $pet]);
    }

    public function edit()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $pet = new Pet($_POST['name'], $_POST['breed'], $_FILES['file']['name']);
            $this->petRepository->addPet($pet);

            return $this->render('description', ['message' => $this->message, 'pet'=>$pet]);
        }
        return $this->render('edit', ['message' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}