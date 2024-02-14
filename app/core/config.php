<?php
defined('ROOTPATH') OR exit("Access Denied");
// function show($stuff){
//     echo"<pre>";
//     print_r( $stuff );
//     echo"</pre>";
// }

if ($_SERVER["SERVER_NAME"] == "localhost") {

    define("DBHOST", "127.0.0.1");
    define("DBNAME", "dms");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("ROOT", "http://localhost/mvc/public");

} else {
    define("ROOT", "http://yourdomain.com");
}

define("DEBUG",true);

