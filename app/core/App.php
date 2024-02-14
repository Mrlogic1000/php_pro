<?php 
namespace Core;
defined('ROOTPATH') OR exit("Access Denied");
class App{
    public $controller ="home";
    public $method = "index";
    private function splitUrl(){
        $url = $_GET['url'] ?: 'home';
        $url = explode("/", $url);
        return $url;
    }
    
    
    public function loadController(){
        $url = $this->splitUrl();         
        $filename = dirname( __DIR__)."/controller/".ucfirst($url[0]).".php";   
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($url[0]);
        }else{
         require  dirname( __DIR__)."/controller/_404.php"; 
         $this->controller = "_404";
        }
        $home = new ('\Controller\\'.$this->controller);
        call_user_func_array([ $home, $this->method], []);
    }
}


