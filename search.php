<?php

include_once("./Models/ProductsModel.php");

$Product_OBJ = new ProductsModel;

$var = $Product_OBJ->ProductSerach($_GET["search_query"]);


print_r($var);






?>