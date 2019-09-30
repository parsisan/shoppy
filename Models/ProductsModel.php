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

public function ProductSerach($keyword = "",$count)
{

    $sql= "SELECT tbl_products.id as product_id,
    tbl_products.title as product_title,
    tbl_products.description,
    tbl_products.price,
    tbl_products.main_pic_url,
    tbl_products.rate,
    tbl_products.publish_date,
    tbl_products.qnty,
    tbl_products.status,
    tbl_products.created_at,
    tbl_products.updated_at,
    tbl_products.category_id,
    tbl_product_catagories.id,
    tbl_product_catagories.title as category_title,
    tbl_product_catagories.status
    FROM tbl_products
    INNER JOIN tbl_product_catagories
    ON tbl_products.category_id = tbl_product_catagories.id
    WHERE tbl_products.status = 1 AND  tbl_product_catagories.status = 1 
    AND tbl_products.title LIKE '%$keyword%'
    OR tbl_products.description LIKE '%$keyword%'
    OR tbl_product_catagories.title LIKE '%$keyword%'
    OR tbl_products.price LIKE '%$keyword%'
    ORDER BY qnty DESC,publish_date ASC
    LIMIT ".$count;
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}




public function getAllProducts($count , $cat_id = null)
{

    if ($cat_id == null || empty($cat_id))
    {
        $sql= "SELECT tbl_products.id as product_id,
        tbl_products.title as product_title,
        tbl_products.publish_date,
        tbl_products.price,
        tbl_products.main_pic_url,
        tbl_products.rate,
        tbl_product_catagories.title as category_title
        FROM tbl_products
        INNER JOIN tbl_product_catagories
        ON tbl_products.category_id = tbl_product_catagories.id
        WHERE tbl_products.status = 1 AND  tbl_product_catagories.status = 1
    
        ORDER BY tbl_products.publish_date ASC
        LIMIT ".$count;
    }
    else
    {

    $sql= "SELECT tbl_products.id as product_id,
    tbl_products.title as product_title,
    tbl_products.publish_date,
    tbl_products.price,
    tbl_products.main_pic_url,
    tbl_products.rate,
    tbl_product_catagories.title as category_title
    FROM tbl_products
    INNER JOIN tbl_product_catagories
    ON tbl_products.category_id = tbl_product_catagories.id
    WHERE tbl_products.status = 1 AND  tbl_product_catagories.status = 1
    AND tbl_products.category_id = $cat_id";
    }

    
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}


public function ProductDetails($id = null)
{
    $sql= "SELECT tbl_products.id as product_id,
    tbl_products.title as product_title,
    tbl_products.description,
    tbl_products.price,
    tbl_products.main_pic_url,
    tbl_products.rate,
    tbl_products.publish_date,
    tbl_products.qnty,
    tbl_products.status,
    tbl_products.created_at,
    tbl_products.updated_at,
		
    tbl_products.category_id,
    tbl_product_catagories.id,
    tbl_product_catagories.title as category_title,
    tbl_product_catagories.status,
		
		tbl_product_gallery.pic_url,
		tbl_product_gallery.product_id
		
    FROM tbl_products
    RIGHT JOIN tbl_product_catagories
    ON tbl_products.category_id = tbl_product_catagories.id
		
		LEFT JOIN tbl_product_gallery
		ON tbl_product_gallery.product_id = tbl_products.id
    WHERE tbl_products.status = 1 AND  tbl_product_catagories.status = 1 
    AND tbl_products.id = ".$id."
    LIMIT 5";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}


public function ProductRelated($cat_id, $count)
{
    $sql= "SELECT tbl_products.id as product_id,
    tbl_products.title as product_title,
    tbl_products.description,
    tbl_products.price,
    tbl_products.main_pic_url,
    tbl_products.rate,
    tbl_products.publish_date,
    tbl_products.qnty,
    tbl_products.status,
    tbl_products.created_at,
    tbl_products.updated_at,
    tbl_products.category_id,
    tbl_product_catagories.id,
    tbl_product_catagories.title as category_title,
    tbl_product_catagories.status
    FROM tbl_products
    INNER JOIN tbl_product_catagories
    ON tbl_products.category_id = tbl_product_catagories.id
    WHERE tbl_products.status = 1 AND  tbl_product_catagories.status = 1 
    AND tbl_products.category_id = $cat_id
    LIMIT $count";
    $result = $this->conn->query($sql);
    $result = $result->fetchAll();
    return $result;
}


}


?>