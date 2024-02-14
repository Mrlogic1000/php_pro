<?php
namespace Controller;
class Login{
    use MainController;
    public function index(){       
        $data['user'] = new \Model\Users;
        $req = new \Core\Request;
        if($req->posted()){                   
            $data['user']->login($_POST);
        }
       

        return $this->view('login',$data);

    }
}