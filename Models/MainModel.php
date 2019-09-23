<?php

include_once("./Models/DB.php");


class MainModel{


    private $conn = "";
    

function __construct()
{
    
    $DB_OBJ = new DB();
    $this->conn = $DB_OBJ->conn;
}


public function getSiteConfig()
{
    $sql= "SELECT * FROM tbl_system LIMIT 1";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}



}



?>