<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
use  \Core\Session;
use  \Model\Users;
use  \Core\Pager;
use  \Model\Post as myPost;

class Post
{
    use MainController;
    public function index($id = null)
    {
       
        $ses = new Session;
  
        $limit = 10;
        $data['pager'] = new Pager($limit);
        $offset = $data['pager']->offset;       
          
      
         $post = new myPost;              
         $data['post'] = $post->where(['id'=>$id]);          
         if($data['post']){
          $data['post'] = $post->add_user_data($data['post']);
          $data['post'] =  $data['post'][0];
  
        
       } 
  
       


     return $this->view('post', $data);
    }

    
    public function delete($id = null)
    {
       
        $ses = new Session;
  
        $limit = 10;
        $data['pager'] = new Pager($limit);
        $offset = $data['pager']->offset;       
          
      
         $post = new myPost;              
         $data['post'] = $post->where(['id'=>$id]);          
         if($data['post']){
          $data['post'] = $post->add_user_data($data['post']);
          $data['post'] =  $data['post'][0];
  
        
       } 
  
       


     return $this->view('post', $data);
    }
    public function edit($id = null)
    {
       
        $ses = new Session;
  
        $limit = 10;
        $data['pager'] = new Pager($limit);
        $offset = $data['pager']->offset;       
          
      
         $post = new myPost;              
         $data['post'] = $post->where(['id'=>$id]);          
         if($data['post']){
          $data['post'] = $post->add_user_data($data['post']);
          $data['post'] =  $data['post'][0];
  
        
       } 
  
       


     return $this->view('post-edit', $data);
    }

}