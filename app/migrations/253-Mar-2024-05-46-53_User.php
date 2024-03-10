<?php
namespace Thunder;
// defined('ROOTPAHT') OR exit('Access Denied');

class User extends Migration
{
   
    protected $table = 'user';
   public function up(){
    $this->addColumn("id INT(11) NOT NULL AUTO_INCREMENT");
    $this->addColumn("username varchar(200) NOT NULL");
    $this->addColumn("email varchar(200) NOT NULL");
    $this->addColumn("password varchar(200) NOT NULL");
    $this->addColumn("image varchar(200)");
    $this->addColumn("date_created datetime");
    $this->addColumn("date_updated datetime");
    
    $this->addPrimaryKey('id');
    /**$this->addColumn();
    $this->addPrimaryKey();
    $this->addUniqueKey();
    $this->addData();
    $this->insertData();
    $this->createTable();  */
    $this->createTable('user');
    // $this->addData('date_created', date("Y-m-d H-i-s"));
    // $this->addData('date_updated', date("Y-m-d H-i-s"));
    // $this->insertData('user');


   }
   public function down(){
    $this->dropTable();

   }
   
    
    

}