<?php
namespace Thunder;
// defined('ROOTPAHT') OR exit('Access Denied');

class Device extends Migration
{
    // use Migration;
    protected $table = 'device';
   public function up(){
    $this->addColumn("id INT(11) NOT NULL AUTO_INCREMENT");
    $this->addColumn("network VARCHAR(200)");
    $this->addColumn("device_name VARCHAR(200)");
    $this->addColumn("mac VARCHAR(200)");
    $this->addColumn("e01 VARCHAR(200)");
    $this->addColumn("w01 VARCHAR(200)");
    $this->addColumn("sn VARCHAR(200)");
    $this->addColumn("model VARCHAR(200)");
    $this->addColumn("version VARCHAR(200)");
    $this->addPrimaryKey('id');
    /**$this->addColumn();
    $this->addPrimaryKey();
    $this->addUniqueKey();
    $this->addData();
    $this->insertData();
    $this->createTable();  */
    $this->createTable('device');
    $this->addData('date_created', date("Y-m-d H-i-s"));
    $this->addData('date_updated', date("Y-m-d H-i-s"));
    $this->insertData('device');


   }
   public function down(){

    $this->dropTable();

   }
   
    
    

}