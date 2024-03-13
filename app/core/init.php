<?php
defined('ROOTPATH') OR exit("Access Denied");
spl_autoload_register(function ($class) { 
    // echo $class;    
    $class = explode("\\", $class);
    $class = end($class);    
    require  "../app/model/".ucfirst($class).".php" ;
});
require "config.php";
require "function.php";
require "Database.php";
require "Model.php";
require "MainController.php";
require "App.php";
