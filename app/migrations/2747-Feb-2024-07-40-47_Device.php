<?php
namespace Thunder;
// defined('ROOTPAHT') OR exit('Access Denied');
// defined('CPATH') or exit('Access Denied!');

class Device extends Migration
{
   
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
    $this->addColumn("date_created datetime");
    $this->addColumn("date_updated datetime");
    $this->addPrimaryKey('id');  
    
    $this->createTable('device');

    $this->addData('network', "IPTV");
    $this->addData('device_name', "Router");
    $this->addData('mac', "D3:H5:A2:4G:Y8:4D");
    $this->addData('e01', "D3:H5:A2:4G:Y8:4D");
    $this->addData('w01', "D3:H5:A2:4G:Y8:4D");
    $this->addData('sn', "1R43W21R667P");
    $this->addData('model', "cHap");
    $this->addData('version', "7.2.1");
    $this->addData('date_created', date("Y-m-d H-i-s"));
    $this->addData('date_updated', date("Y-m-d H-i-s"));
    $this->insertData('device');
    
    
    /**$this->addColumn();
    $this->addPrimaryKey();
    $this->addUniqueKey();
    $this->addData();
    $this->insertData();
    $this->createTable();  */
   }
   public function down(){

    $this->dropTable();

   }
   
    
    

}