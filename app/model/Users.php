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
class Users
{
    use Model;
    protected $table = "users";
    protected $primaryKey = 'email';
    protected $fillable = ['username', 'email', 'password',];
    protected $validationRules = [
        "email" => [
            "email",
            "unique",
            "required",
        ],
        "password" => [
            "not_less_than_8",
            "required",
        ],
        "username" => [
            "alpha_space",
            "unique",
            "required",

        ],

    ];
    public function signup($data)
    {

        if ($this->validate($data)) {
            // add extra columns here
           
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);           
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $this->insert($data);
            // redirect('user');
        }


    }
    public function login($data)
    {
        $row = $this->first([$this->primaryKey => $data[$this->primaryKey]]);
        if ($row) {
// die(password_verify($data['password'], $row->password));
            if(password_verify($data['password'], $row->password)) {
                $ses = new \Core\Session;
                $ses->auth($row);
                redirect('home');
                
            } else {
                $this->errors[$this->primaryKey] = "The " . $this->primaryKey . " or password is not ";

            }

        } else {
            $this->errors[$this->primaryKey] = "The " . $this->primaryKey . " or password is not correct";
        }


    }

}