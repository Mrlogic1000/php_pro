<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
class {CLASSNAME}
{
    use MainController;
    public function index()
    {
        $devices = new \Model\Devices();
        $data = ['id'=>3];
       
        $data['devices'] = $devices->findAll();


     return $this->view('{classname}', $data);
    }

}


