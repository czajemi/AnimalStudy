<?php
session_start();
require 'Routing.php';

$path= trim($_SERVER['REQUEST_URI'], '/');


Router::get('', 'DescriptionController');
Router::get('description', 'DescriptionController');
Router::post('login', 'SecurityController');

Router::run($path);