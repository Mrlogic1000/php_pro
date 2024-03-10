<?php
namespace Thunder;
// defined('ROOTPAHT') OR exit('Access Denied');

class Post extends Migration
{
   
    protected $table = 'post';
   public function up(){
    $this->addColumn("id INT(11) NOT NULL AUTO_INCREMENT");
    $this->addColumn("user_id INT unsigned");
    $this->addColumn("post text null");
    $this->addColumn("image varchar(1024) null");
    $this->addColumn("date datetime null");
    $this->addKey("user_id");
    $this->addKey("date");   
    $this->addPrimaryKey('id');
    /**$this->addColumn();
    $this->addPrimaryKey();
    $this->addUniqueKey();
    $this->addData();
    $this->insertData();
    $this->createTable();  */
    $this->createTable('post');
    // $this->addData('date_created', date("Y-m-d H-i-s"));
    // $this->addData('date_updated', date("Y-m-d H-i-s"));
    // $this->insertData('post');


   }
   public function down(){
    $this->dropTable();

   }
   
    
    

}