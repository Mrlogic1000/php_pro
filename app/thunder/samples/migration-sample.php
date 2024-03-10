<?php
namespace Thunder;
defined('ROOTPAHT') OR exit('Access Denied');

class {CLASSNAME} extends Migration
{
   
    protected $table = '{classname}';
   public function up(){
    $this->addColumn("id INT(11) NOT NULL AUTO_INCREMENT");
    $this->addColumn("date_created datetime");
    $this->addColumn("date_updated datetime");
    
    $this->addPrimaryKey('id');
    /**$this->addColumn();
    $this->addPrimaryKey();
    $this->addUniqueKey();
    $this->addData();
    $this->insertData();
    $this->createTable();  */
    $this->createTable('{classname}');
    $this->addData('date_created', date("Y-m-d H-i-s"));
    $this->addData('date_updated', date("Y-m-d H-i-s"));
    $this->insertData('{classname}');


   }
   public function down(){
    $this->dropTable();

   }
   
    
    

}