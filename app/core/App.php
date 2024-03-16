<?php 
namespace Core;
defined('ROOTPATH') OR exit("Access Denied");
class App{
    public $controller ="home";
    public $method = "index";
    private function splitUrl(){
        $URL = $_GET['url'] ?: 'home';
        $URL = explode("/", $URL);
        // print_r($URL);
        
        return $URL;
    }
    
    
    public function loadController(){
        $URL = $this->splitUrl();         
        $filename = dirname( __DIR__)."/controller/".ucfirst($URL[0]).".php";   
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }else{
         require  dirname( __DIR__)."/controller/_404.php"; 
         $this->controller = "_404";
        }
        $controller = new ('\Controller\\'.$this->controller);
        $data = [];
        if(!empty($URL[1])){

            if(method_exists($controller,$URL[1])){
             $this->method = $URL[1];
             unset($URL[1]);
            }    
        }
        
        call_user_func_array([  $controller, $this->method], $URL);
    }
}


