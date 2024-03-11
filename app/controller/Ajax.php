<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
use \Model\Image;
use \Model\Users;
use \Model\Post;
use \Core\Request;
class Ajax
{
    use MainController;
    public function index()
    {
    //   die('Ajax');
        $ses = new \Core\Session;        
        if(!$ses->is_logged_in()){
           
            die;
        }
        $req = new Request;
       
        // $user = new \Model\User;
        // $data['user']->login($_POST);

        $info['success'] = false;
        $info['message'] = '';
        if($req->posted()){            

           $data_type = $req->input('data_type');    

            if($data_type == 'profile-image'){
                $info['data_type'] = 'profile-image';
                $image_row = $req->files('image');


                if(!empty($image_row['error']) && $image_row['error'] == 0){

                    $folder = 'upload/';
                if(!file_exists($folder)){
                     mkdir($folder,0777,true);
                    }
                
                 $destination = $folder. time() . $image_row['name'];
                 move_uploaded_file($image_row['tmp_name'],$destination); 

                 $image_resize = new Image();
                 $image_resize->resize($destination,1000);

                 $id = user('id');
                 $user = new Users();
                 $row = $user->first(['id'=>$id],);
                 if(file_exists($row->image)){
                    unlink($row->image);
                 }
                 $user->update($id,['image'=>$destination]);

                     $info['message'] = "The profile image changed successfully";
                     $info['success'] = true;

                }     

            }else{
                if($data_type == 'create-post'){
                    $id = user('id');
                    $info['data_type'] = 'profile-image';
                    $image_row = $req->files('image');
    
                    if($image_row['error'] == 0){
    
                        $folder = 'upload/';
                    if(!file_exists($folder)){
                         mkdir($folder,0777,true);
                        }
                    
                     $destination = $folder. time() . $image_row['name'];
                     move_uploaded_file($image_row['tmp_name'],$destination); 
    
                     $image_resize = new Image();
                     $image_resize->resize($destination,1000);   
                     
    
                    }     
    
                    $post = new Post;
                    $arr = [];
                   
                    $arr['post'] = $req->input('post');                    
                    $arr['image'] = $destination ?? '';
                    $arr['user_id'] = $id;
                    $arr['date'] = date("Y-m-d H:i:s");
                    if($post->validate($arr)){                        
                        $post->insert($arr);
                        $info['message'] = "The new post created successfully";
                        $info['success'] = true;
                    }else{
                        if(!empty($post->getErrors('post'))){

                            $info['message'] = $post->getErrors('post');
                        }
                    }
                    
                    



                }
            } 
        echo json_encode($info);              
        }


     
    }

}