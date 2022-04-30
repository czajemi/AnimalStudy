<?php
require 'Routing.php';

$path= trim($_SERVER['REQUEST_URI'], '/');

Router::get('login', 'LoginController');
Router::get('description', 'DescriptionController');

Router::run($path);