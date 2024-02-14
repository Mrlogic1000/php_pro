<?php
namespace Controller;
class SignUp{
    use MainController;
    public function index(){
        $data['user'] = new \Model\Users;
        $req = new \Core\Request;
        if($req->posted()){            
            $data['user']->signup($_POST);
        }
       

        return $this->view('signup',$data);

    }
}