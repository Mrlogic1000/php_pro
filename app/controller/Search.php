<?php
namespace Controller;
defined('ROOTPATH') OR exit("Access Denied");
use \Model\Users;
use \Core\Pager;
class Search
{
    use MainController;
    public function index()
    {
        $data = [];       
        $user = new Users;
        $limit = 10;
        $data['pager'] = new Pager($limit);
        $offset = $data['pager']->offset;
       
        $arr['find'] = $_GET['find'] ?? null;
        if($arr['find']){
            $arr['find'] = "%". $_GET['find']. "%";
            // echo $arr['find'];
            $data['rows'] = $user->query("select * from users where username like :find || email like :find",$arr);
            // print_r($data['rows']);
        }


     return $this->view('search', $data);
    }

}


