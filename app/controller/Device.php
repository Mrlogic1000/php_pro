<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");

class Device 
{
    use MainController;
    public function index()
    {
        $ses = new \Core\Session;
        if(!$ses->is_logged_in()){
           
            redirect('login');
        }

        $devices = new \Model\Devices();
        echo $ses->is_logged_in();
        $data = ['id'=>3];
        if(isset($_POST['submit']) ){

            $devices->insert($_POST);
            // redirect("home");
        }
        // print_r($_POST);
        
        $data['devices'] = $devices->findAll();


     return $this->view("devices", $data);
    }

}


