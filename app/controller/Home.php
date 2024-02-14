<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
class Home
{
    use MainController;
    public function index()
    {
        $devices = new \Model\Devices();
        $data = ['id'=>3];
       
        $data['devices'] = $devices->findAll();


     return $this->view("home", $data);
    }

}


