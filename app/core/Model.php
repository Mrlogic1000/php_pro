<?php
namespace Model;
defined('ROOTPATH') OR exit("Access Denied");

trait Model
{
    use \Model\Database;
    
    protected $limit = 10;
    protected $offset = 0;
    protected $errors = [];
    protected function getPrimaryKey(){
        return $this->primaryKey ?? 'id';
    }
    public function getErrors($key){
        if(!empty($this->errors[$key])){
            return $this->errors[$key];

        }
        return "";
    }
    public function findAll()
    {
        $query = "select * from $this->table";
        $result = $this->query($query);
       return $result;
    }
    public function where($data,$data_not = []){
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k){
            $query .= $k ." = :".$k . " && ";
           
        }
        foreach ($key_not as $k){
            $query .= $k ." != :".$k . " && ";
           
        }
        $query = trim( $query," && ");
        $query .= " limit $this->limit offset $this->offset";
        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
       return $this->query($query, $data);
       
    }
    public function first($data,$data_not = []){
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k){
            $query .= $k ." = :".$k . " && ";
           
        }
        foreach ($key_not as $k){
            $query .= $k ." != :".$k . " && ";
           
        }
        $query = trim( $query," && ");
        $query .= " limit $this->limit offset $this->offset";        
        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
       $result = $this->query($query, $data);     
       if($result)
           return $result[0];
       
       return false;
    }

    public function insert($data){
        if(!empty($this->fillable)){
            foreach ($data as $key=>&$val){
                if(!in_array($key, $this->fillable)){
                    unset($data[$key]);

            }
        }
    }
        $keys = array_keys($data);
        $query = "insert into $this->table(" . implode(',',$keys) . ") values(:".implode(", :",$keys) .")";
        // print_r($data);
        $this->query($query, $data);
        // echo $query;
        return false;
    }
    public function update($id,$data,$id_column = 'id'){
        if(!empty($this->fillable)){
            foreach ($data as $d){
                if(!in_array($d, $this->fillable)){
                    unset($data[$d]);

            }
        }
    }
        $query = "update $this->table set ";
        $key = array_keys($data);
       
        foreach ($key as $k){
            $query .= $k ." = :".$k . ", ";           
        }
       
        $query = trim( $query,", ");  
        $query .= " where $id_column = :$id_column";      
       
        echo $query;
        $data[$id_column] = $id;
       $this->query($query, $data);
       return false;
    

    }
    public function delete($id, $id_column = "id"){
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";
        $this->query($query, $data);
        return false;
    }
    public function validate($data){
        $this->errors = [] ;
        if(!empty($this->validationRules)){
            foreach($this->validationRules as $column => $rules){
                if(!isset($data[$column]))
                    continue;
                foreach($rules as $rule){                 
                    switch($rule){
                        case "required":
                           if(empty($data[$column])){                                               
                            $this->errors[$column] = "The " . ucfirst($column). " is required";
                           }
                            break;
                        case "email":
                            if(!filter_var($data[$column], FILTER_VALIDATE_EMAIL)){
                                $this->errors[$column] = "Invalid " . $column. " address";

                            }
                            break;
                        case "alpha_space":
                           
                            if(!preg_match("/^[a-zA-Z ]+$/", $data[$column])){
                                $this->errors[$column] = ucfirst($column). " should only contains alphabetical letters";
                                
                            }
                            break;
                        case "alpha":
                            if(!preg_match("/^[a-zA-Z]+$/", $data[$column])){
                                $this->errors[$column] = ucfirst($column). " should only contains alphabetical letters";

                            }
                            break;
                        case "not_less_than_8":
                            if(strlen(trim($data[$column]))<8){
                                $this->errors[$column] = ucfirst($column). " should not be less than 8 characters";
                                
                            }
                            break;
                        
                            case "alpha_numeric":
                                if(!preg_match("/^[a-zA-Z0-9]+$/", $data[$column])){
                                    $this->errors[$column] = ucfirst($column). " should only contains alphabetical letters";
    
                                }
                                break;

                            case "alpha_symbol":
                                if(!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\&\{\}]+$/", $data[$column])){
                                    $this->errors[$column] = ucfirst($column). " should only contains alphabetical letters";
    
                                }
                                break;
                            case "alpha_numeric_symbol":
                                if(!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\&\{\}]+$/", $data[$column])){
                                    $this->errors[$column] = ucfirst($column). " should only contains alphabetical letters";
    
                                }
                                break;
                            case "unique":
                               
                                $key = $this->getPrimaryKey();                                
                                if(!empty($data[$key])){                                    
                                    if($this->first([$column=>$data[$column]],[$key=>$data[$key]])){                                        
                                        $this->errors[$column] = ucfirst($column) . " should be unique";

                                    }else{
                                        if($this->where([$column=>$data[$column]])){                                            
                                            $this->errors[$column] = ucfirst($column) . " should be unique";

                                        }
                                    }

                                }
                                break;
                            default:
                                $this->errors["rules"] = "The rule " . $rule . " was not found";
                                break;





                    }
                }

            }
        }
        if(empty($this->errors)){
            return true;
        }
        return false;

    }
}
