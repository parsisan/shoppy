<?php

include_once("./Models/DB.php");


class ProductsModel
{


    private $conn = "";


function __construct()
{
    
    $DB_OBJ = new DB();
    $this->conn = $DB_OBJ->conn;
}

public function ProductSerach($keyword = "")
{

    $sql= "SELECT * FROM tbl_products WHERE status = 1 AND title LIKE '%$keyword%'";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}


}


?>