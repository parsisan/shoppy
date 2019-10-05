<?php



$id = $_GET["id"];
ProductAddToCard($id);

function ProductAddToCard($id)
{
    if (isset($_COOKIE['ShoppyCart']))
    {
        $cookie_value = $cookie_value."-".$id;
    }
    else
    {
        $cookie_value = "";
    }


    $cookie_name = "ShoppyCart";
   

    setcookie($cookie_name,$cookie_value,time() + (86400 * 30),"/");
    if(isset($_COOKIE['ShoppyCart']))
    {
        echo "OK";
    echo $_COOKIE['ShoppyCart'];
    }
    else
    {
        echo "NOT";
    }

}




?>