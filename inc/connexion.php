<?php
function mySQLconnection(){
    static $db=null;

    if ($db ===null) {
        $db=new PDO('mysql:host=localhost;dbname=crypto' , 'root' , '');
    }

    return $db;
}
?>