<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';


class SecurityController extends AppController
{
    
    public function login()
    {
        $user = new User('emilia@czaja.com', password_hash('admin', PASSWORD_BCRYPT), 'Emilia', 'Czaja');
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email){
            return $this->render( 'login', ['messages' => ['User with this email not exist']]);
        }
        if (!password_verify($password, $user->getPassword())){
            return $this->render( 'login', ['messages' => ['Wrong password']]);
        }

        $_SESSION['loggedUser'] = $email;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/description");
    }

    public function logout() {
        if(isset($_SESSION['loggedUser']))
            unset($_SESSION['loggedUser']);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
    
}