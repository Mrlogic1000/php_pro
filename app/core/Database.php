<?php
namespace Model;
defined('ROOTPATH') OR exit("Access Denied");
trait Database{

    private function connect(){
        $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
        $con = new \PDO($string, DBUSER, DBPASS);       
        return $con;                                                   

    }
    public function query($sql, $data =[]){
        $con = $this->connect();
        $smt = $con->prepare($sql);
        $check = $smt->execute($data);
        if($check){
            $result = $smt->fetchAll(\PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;

            }
            return false;

        }


    }
}

