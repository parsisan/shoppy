<?php


class DB
{

    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "shoppy_db";
    public $conn = "";

    public $site_title= "";
    public $site_url= "";



    function __Construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->db_name", $this->username, $this->password,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
             // set the PDO error mode to exception
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            //  $result = $this->conn->query("SELECT * FROM tbl_system");
            // $result = $result->fetch();
            // $this->site_title= $result[1];
            // $this->site_url= $result[2];

                return $this->conn;

             }
         catch(PDOException $e)
             {
             echo "Connection failed: " . $e->getMessage();
             }
    }

    function __Destruct()
    {
        $this->conn = null;
    }



    
  

    public function Insert($sql)
    {
        $this->conn->query($sql);

    }

    public function Delete($sql)
    {
        $this->conn->query($sql);

    }

    public function Update($sql)
    {
        $this->conn->query($sql);

    }


}



// $db_obj = new DB;
// $db_obj->Connect();
// $db_obj->Exec("SELECT * FROM tbl_users");



?>