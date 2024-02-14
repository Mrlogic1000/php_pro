<?php
namespace Model;
defined('ROOTPATH') OR exit("Access Denied");
class Devices{
    use Model;
    protected $table = 'device';
    

    protected $fillable = ['network','devices','mac','e01','w01','sn','model','version'] ;

}