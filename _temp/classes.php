<?php

include_once("./MyClass.php");





$obj1 = new MyClass;


echo $obj1->prop1;
echo "<br>";



$obj2 = new MyClass;

$obj2->prop1 = "NEW HELLO";
echo $obj2->prop1;

$obj3 = new MyClass;
echo "<br>";
echo $obj3->prop1;



$obj4 = new MyClass;
echo $obj4->prop1;
$obj4->myFunc("DAVID");
echo $obj4->prop1;



$BD = new MyClass;

?>