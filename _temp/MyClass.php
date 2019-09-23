<?php

require_once("./FatherClass.php");


class MyClass
{
    function __construct()
    {
        echo "I'm COSTRUCT";
        echo "<br>";
 
        $father = new FatherClass;
    }




    
    public $prop1 = "Hello";
    private $prop2 = "BYE";
    protected $prop3 = "PROTECT";



    


    public function myFunc($name)
    {

        $this->prop1 = $name;

    }
    





}


?>