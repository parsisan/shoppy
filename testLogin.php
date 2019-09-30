<?php
//SESSSION JOBS

if(!isset($_SESSION))
{
session_start();
}




if(isset($_SESSION["isLogin"]))
{
    $isUserLogin = true;
    echo "IS LOGIN";

}
else
{
    $isUserLogin = false;
    echo "IS NOT LOGIN";
}

//SESSION JOBS


// LOGIN JOBS IS HERE


if (!empty($_POST))
{
  
if(isset($_POST['LoginSubmit']) )
{

   

if (!empty($_POST["inputEmail"]) )
{

    $inputUsername = $_POST["inputEmail"];

	if (!empty($_POST["inputPassword"]))
	{

        $inputPassword = $_POST["inputPassword"];

        require_once("./Models/UsersModel.php");

        $Users_OBJ = new UsersModel;

        $result_UserLogin = $Users_OBJ->UserLogin($inputUsername,$inputPassword);

        if (count($result_UserLogin) > 0)
        {

		   
			$_SESSION["isLogin"] = true;
			$_SESSION["FirstName"] = $result_UserLogin[0]["firstName"];
			$_SESSION["LastName"] = $result_UserLogin[0]["lastName"];
            
            
            echo "<br>SESSION STARTED";

        }
        else
        {
         
            $_SESSION["isLogin"] = false;
			$_SESSION["FirstName"] = $result_UserLogin[0]["firstName"];
            $_SESSION["LastName"] = $result_UserLogin[0]["lastName"];
            
            header ("Location: ./login.php ");

        }


	}

}
}
}


// LOGIN
?>