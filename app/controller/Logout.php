<?php
namespace Controller;
class Logout{
    use MainController;
    public function index(){
        $ses = new \Core\Session;
        $ses->logout();
        redirect('login');
    }
}