<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
class Order
{
    use MainController;
    public function index()
    {
        $data = [];
        echo "order";


     return $this->view('order', $data);
    }

}


