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

public function UserRegister($title, $firstName,$lastName,$email,$cell,$password,$dob)
{
    $sql_check = "
    SELECT * FROM tbl_users 
    WHERE (tbl_users.email = '$email' OR tbl_users.cell = '$cell');
    ";
    $result_check = $this->conn->query($sql_check);
    $result_check = $result_check->fetchAll();



    if (count($result_check) == 0)
    {

        $dob = (!empty($dob) || $dob != NULL) ? "'$dob'" : "NULL";
       

    $_created_at = date('Y-m-d h:i:s', time());
    $sql = "
    INSERT INTO tbl_users (title,firstName,lastName,email,cell,password,dob,created_at,status)
    VALUES ('$title','$firstName','$lastName','$email','$cell','$password',$dob,'$_created_at',1)
    ";

    $result = $this->conn->query($sql);
    return $result;
    // TRUE OR FLASE
    }
    else
    {
    return 2;
    }
}


}
?>