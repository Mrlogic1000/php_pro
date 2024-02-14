<?php
namespace Controller;
class User{

    use MainController;
    public function index(){
        $users = new \Model\Users;
       

        $data['users'] = $users->findAll();

        return $this->view("users", $data);
    }

}