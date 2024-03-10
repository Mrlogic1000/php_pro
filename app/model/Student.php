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
class Student
{
    use Model;
    protected $table = 'students';
    protected $primaryKey = 'email';
    protected $fillable = [];
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
    
    

}