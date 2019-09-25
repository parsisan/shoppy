<?php

require("./header.php");


include_once("./Models/ProductsModel.php");

$Product_OBJ = new ProductsModel;

$isSearched = false;

if (!empty($_GET))
{
	if (strlen($_GET["q"]) >= 3)
	{
	
		$result_search = $Product_OBJ->ProductSerach($_GET["q"],10);
		$isSearched = true;
	}

}
else
{
	$isSearched = false;
}


?>

<!-- 
Body Section 
-->
<div class="row">
	<?php include("./cat_sidebar.php") ?>
<div class="span9">
<div class="well well-small">
	
	<?php

	if ($isSearched == false)
	{
		echo "<b>NO RECORD FOUND...!</b>";

	}
	else
	{

		if (count($result_search) > 0)
		{
			foreach ($result_search as $key => $search_value) {
				
			
		?>

<div class="row-fluid">	  
		<div class="span2">
			<img src="<?php echo $siteConfig[0]["site_url"] .$search_value["main_pic_url"] ?>" alt="">
		</div>
		<div class="span6">
			<h5><?php echo $search_value["product_title"]; ?></h5>
			<p>
			<?php 
			echo substr($search_value["description"],0,185);
			?>
			</p>
		</div>
		<div class="span4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3> <?php echo number_format($search_value["price"]); ?></h3>
		<label class="checkbox">
			<input type="checkbox">  Adds product to compair
		</label><br>
		<div class="btn-group">
		  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  <a href="product_details.php?product=<?php echo $search_value["product_id"] ?>" class="shopBtn">VIEW</a>
		 </div>
			</form>
		</div>
		<?php echo $search_value["category_title"]?>
	</div>
	
	<hr class="soften">

		<?php
		}
		}
		else
		{
			echo "<b>NO RECORD FOUND...!</b>";
		}

	}


?>





</div>
</div>
</div>
<!-- 
Clients 
-->
<section class="our_client">
	<hr class="soften"/>
	<h4 class="title cntr"><span class="text">Manufactures</span></h4>
	<hr class="soften"/>
	<div class="row">
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/1.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/2.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/3.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/4.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/5.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/6.png"></a>
		</div>
	</div>
</section>

<!--
Footer
-->
<?php
include_once("./footer.php");
?>