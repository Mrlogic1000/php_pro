<?php


trait Controller{
    public function view($name,$data){
        extract($data);
           
        $filename = dirname( __DIR__)."/views/".$name.".view.php";   
        if(file_exists($filename)){
            require $filename;
        }else{
         require  dirname( __DIR__)."/views/404.view.php"; 
        }
    }
}