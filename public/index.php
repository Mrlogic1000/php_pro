<?php

session_start();
$phpversion = '8.0';
if(phpversion() < $phpversion) {
    die("Your PHP verion must be {$phpversion} or higher to run this app. Your current version is " . phpversion());
}

define("ROOTPATH",__DIR__ . DIRECTORY_SEPARATOR);
require dirname(__DIR__ )."/app/core/init.php";



DEBUG ? ini_set("display_errors",1) : ini_set("display_errors",0);

$loadContro = new \Core\App();

$loadContro->loadController();