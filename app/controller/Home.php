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

        
        $file = 'img.jpg';
        
        $image = new \Model\Image();
        $image->getThumbnail($file);



     return $this->view("home", $data);
    }

}


