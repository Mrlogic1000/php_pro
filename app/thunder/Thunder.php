<?php

namespace Thunder;

defined('CPATH') or exit('Access Denied!');

class Thunder
{
    private $version = '1.0.0';

    public function db($argv){
        $mode = $argv[1] ?? null;
        $param1 = $argv[2] ?? null;
        // check if db name empty
       

        // clean db name
        $param1 = preg_replace("/[^a-zA-Z0-9_]+/","",$param1);
        if(preg_match("/[^a-zA-Z_]+/",$param1))
            die("\n\rThat param1 cannot start with a number\n\r");
            //     

        switch ($mode) {
            case 'db:create':
                if (empty($param1))
                die("\n\rPlease provide a db name");
            $db = new Database;
            $query = "create database if not exists ".$param1;
            $db->query($query);
            die("\n\rDatabase created successfully\n\r");       
                break;

            case 'db:table':
                if (empty($param1))
                die("\n\rPlease provide a db name");
            $db = new Database;
            $query = "describe ".$param1;
            $result = $db->query($query);
            if($result) {
                print_r($result);
            }else{
                echo "\n\rcould not find data for table: $param1\n\r";
            }
                break;

                // Delet database
                case 'db:drop':
                    if (empty($param1))
                die("\n\rPlease provide a db name");
            $db = new Database;
            $query = "drop database ".$param1;
            $db->query($query);
            die("\n\rDatabase deleted successfully\n\r"); 
                    break;
                case '':
                    // db
                    break;
                case '':
                    // db
                    break;
            default:
                die("\n\runknow command $argv[1]");
                break;
        }
    }
    // db----------------------------------db
    public function make($argv)
    {
        $mode = $argv[1] ?? null;
        $classname = $argv[2] ?? null;
        // check if class name empty
        if (empty($classname))
            die("\n\rPlease provide a controller name");

        // clean class name
        $classname = preg_replace("/[^a-zA-Z0-9_]+/","",$classname);
        if(preg_match("/[^a-zA-Z_]+/",$classname))
            die("\n\rThat classname cannot start with a number\n\r");


            // 
        

        switch ($mode) {
            case 'make:controller':
                $filename = 'app' . DS . 'controller' . DS . ucfirst($classname) . ".php";
        if (file_exists($filename))
            die("\n\rThat controller name already exist\n\r");
                $sample_file = file_get_contents('app' . DS . 'thunder' . DS . 'samples' . DS . 'controller-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower($classname), $sample_file);

                if (file_put_contents($filename, $sample_file)) {
                    die("\n\rController created successfully\n\r");
                } else {
                    die("\n\rFail to create Controller du to an error\n\r");
                }
                break;

            case 'make:model':
                $filename = 'app' . DS . 'model' . DS . ucfirst($classname) . ".php";
        if (file_exists($filename))
            die("\n\rThat model name already exist\n\r");
                $sample_file = file_get_contents('app' . DS . 'thunder' . DS . 'samples' . DS . 'model-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                if(!preg_match("/s$/",$classname))
                    $sample_file = preg_replace("/\{table\}/", strtolower($classname). "s", $sample_file);
                

                if (file_put_contents($filename, $sample_file)) {
                    die("\n\rModel created successfully\n\r");
                } else {
                    die("\n\rFail to create Controller du to an error\n\r");
                }
                break;
            case 'make:migration':
                $folder = 'app' . DS . 'migrations'.DS;
                if(!file_exists($folder)){
                    mkdir($folder,0777,true);
                }
                $filename = $folder . date('js-M-Y-H-i-s_') . ucfirst($classname) . ".php";
        if (file_exists($filename))
            die("\n\rThat migration name already exist\n\r");
                $sample_file = file_get_contents('app' . DS . 'thunder' . DS . 'samples' . DS . 'migration-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                
                $sample_file = preg_replace("/\{classname\}/", strtolower($classname), $sample_file);
                

                if (file_put_contents($filename, $sample_file)) {
                    die("\n\rMigration created:".basename($filename)."\n\r");
                } else {
                    die("\n\rFail to create Controller du to an error\n\r");
                }
                break;
            default:
                die("\n\runknow command $argv[1]");                
                break;
        }
    }
    public function list($argv){
        $mode = $argv[1];                
        switch ($mode) {
            case 'list:migrations':                    
        
                $folder = "app".DS."migrations".DS;        
                if(!file_exists($folder)){                                       
                   
                   die("\n\rMigration folder is empty\n\r");
        
                }
                $files = glob($folder."*.php");
               echo "\n\rMigration files:\n\r";
               foreach($files as $file){
                echo basename($file) . "\n\r";
               }
               break;
            



            
            }

    }
    public function migrate($argv)
    {
        $mode = $argv[1];
        $filename = $argv[2];        

        $filename = "app".DS."migrations".DS.$filename;        
        if(file_exists($filename)){
            require $filename;
            preg_match("/[a-zA-Z]+\.php$/",$filename,$match);
            
            $classname = str_replace(".php","",$match[0]);
           $myclass = new ("\Thunder\\$classname")();
           switch($mode){
            case "migrate":
                $myclass->up();
                break;

            case "migrate:refresh":
                $myclass->down();
                $myclass->up();
                break;

            case "migrate:delete":
                $myclass->down();                
                break;

           }
           
           die("\n\rMigration created:".basename($filename)."\n\r");

        }else{
            die("\n\rFail to migrate $filename due to an error\n\r");

        }
    }

    public function help()
    {
        echo "
        Thunder v$this->version Command Line Tool
        Database
        db:create..........Create a new database schema.
        db:seed............Runs the specified seeder to pupulate known data into the database.
        db:table...........Retrieves information on the selected table.
        db:drop............Drop/Delete a database.
        migrate............Locates and runs a migration from the specified plugin floder.
        migrate:refresh....Does  refresh (run down and up) the current state of the database.
        migrate:rollback...Runs the 'down' method for a migration in the folder.

        Generators
        make:migration.....Generates  a new migration file.
        make:model.........Generates a new model file.
        make:seeder........Generates a new seeder file.
        Others
        list:migration.....Display all the migration files.
       
        ";
    }
}