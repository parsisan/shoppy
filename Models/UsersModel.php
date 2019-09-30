<?php
include_once("./Models/DB.php");


class UsersModel
{


    private $conn = "";


function __construct()
{
    
    $DB_OBJ = new DB();
    $this->conn = $DB_OBJ->conn;
}




public function UserLogin($username, $password)
{
    $sql = "
    SELECT * FROM tbl_users 
    WHERE (tbl_users.email = '$username' OR tbl_users.cell = '$username') AND 
    tbl_users.password = '$password'
    LIMIT 1;
    ";

    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}



}
?>