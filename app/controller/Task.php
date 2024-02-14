<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
class Task{
    use MainController;
    public function index(){
        $data = [];
        return $this->view("task",$data);
    }
}