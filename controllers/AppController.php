<?php

class AppController {

    private $request;

    function __construct(){
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool{
        return $this->request === 'GET';
    }

    protected function isPost(): bool{
        return $this->request === 'POST';
    }

    public function render(string $template = null, array $variables = []) {
       $filepath = 'public/views/'.$template.'.php';
       $output = "Page not found.";

       if(file_exists($filepath)) {
            extract($variables);
            
            ob_start();
            include $filepath;
            $output = ob_get_clean();
       }
       print $output;
    }
}