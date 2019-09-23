<?php
include_once("./Models/DB.php");


class PagesModel
{


    private $conn = "";
    

function __construct()
{
    
    $DB_OBJ = new DB();
    $this->conn = $DB_OBJ->conn;
}


public function getMenus()
{


    $sql= "SELECT * FROM tbl_system_menus WHERE status = 1";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;

}

public function getCatSidebar()
{
    $sql= "SELECT * FROM tbl_product_catagories WHERE status = 1";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}

public function getSliders($count = 1)
{
    $sql= "SELECT * FROM tbl_system_pages_slider WHERE status = 1 OR status=3 LIMIT ".$count;
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}



}

?>