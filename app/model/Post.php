<?php
namespace Model;

/*****************************
 * roles include:
 * alpha
 * required 
 * alpha_space
 * alpha_numeric
 * alpha_symbol
 * alpha_numeric_symbol
 * email
 * numeric
 * unique
 * symbol
 * not_less_than_8 
 ******************************** */
class Post
{
    use Model;
    protected $table = 'post';
    // protected $primaryKey = 'email';
    protected $fillable = 
    [
        'post',
        'user_id',
        'image',
        'date',
    ];
    protected $onInsertValidationRules = [
        "post" => [           
            "required",
        ],
       

    ]; 
    protected function get_row(string $sql,$row){
        $res = $this->query($sql,$row);
        foreach($res as $data){
            return $data;
            
        }
    }
    public function add_user_data($rows){
        foreach($rows as $key=>$row){           
            $res = $this->get_row("select * from users where id = :id ",['id'=>$row->user_id]);            
            $rows[$key]->user = $res;  
        }       
        return $rows;

    }
    
    

}