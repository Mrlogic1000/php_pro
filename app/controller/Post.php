<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
use \Model\Devices;
class Post
{
    use MainController;
    public function index()
    {
        $post = new Devices;
        $data = ['id'=>3];
       
        $data['post'] = $post->findAll();


     return $this->view('post', $data);
    }

}


