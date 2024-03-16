<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
use  \Core\Session;
use  \Model\Users;
use  \Core\Pager;
use  \Model\Post;
class Home
{
    use MainController;
    public function index()
    {
      
      $id = user('id');
      $ses = new Session;

      $limit = 10;
      $data['pager'] = new Pager($limit);
      $offset = $data['pager']->offset;
      


      if(!$ses->is_logged_in()){
        redirect('login');

      }
      $user = new Users;
      $data['row'] = $row = $user->first(['id'=>$id]);

     if($data['row']){
       $post = new Post;
       $post->limit = $limit;
       $post->offset = $offset;       
       $data['posts'] = $post->findAll(['user_id'=>$row->id]);       
       if($data['posts']){
        $data['posts'] = $post->add_user_data($data['posts']);
        // print_r($data['posts']);

       }
     } 

     return $this->view('home', $data);
    }

}


