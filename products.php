<?php require_once("./header.php");

include_once("./Models/ProductsModel.php");

$Products_OBJ = new ProductsModel;

if (empty($_GET))
{
$result_products = $Products_OBJ->getAllProducts(12);
}
else
{
	

	$result_products = $Products_OBJ->getAllProducts(12,$_GET["cat_id"]);

}
?>
<!-- 
Body Section 
-->
<div class="row">

	<?php

include_once("cat_sidebar.php");
?>

	<div class="span9">
		<!-- 
New Products
-->
		<div class="well well-small">
			<h3>Our Products </h3>


			<?php 

$counter= -1;
for($i=0; $i< count($result_products); $i=$i+3)
{
	

	?>
			<div class="row-fluid">
				<ul class="thumbnails">

					<?php

	for($j=1; $j <= 3; $j++)
	{
		

	
		$counter++;
	if ($counter < count($result_products))
	{
?>
					<li class="span4">
						<div class="thumbnail">
							<a href="product_details.php<?php echo "?product=".$result_products[$counter]["product_id"]; ?>" class="overlay"></a>
							<a class="zoomTool" href="product_details.php<?php echo "?product=".$result_products[$counter]["product_id"]; ?>" title="add to cart"><span
									class="icon-search"></span> QUICK VIEW</a>
							<a href="product_details.php<?php echo "?product=".$result_products[$counter]["product_id"]; ?>"><img src="<?php echo $result_products[$counter]["main_pic_url"];?>" alt=""></a>
							<div class="caption cntr">
								<p><?php echo $result_products[$counter]["product_title"]; ?></p>
								<p><strong> <?php echo number_format($result_products[$counter]["price"]); ?></strong></p>

								<h4>
								<a class="shopBtn" href="./testCart.php?id=<?php echo $result_products[$counter]["product_id"]; ?>" title="add to cart"> Add to cart </a></h4>
								
								<div class="actionList">
									<a class="pull-left" href="#">Add to Wish List </a>
									<a class="pull-left" href="#"> Add to Compare </a>
								</div>
								<br class="clr">
							</div>
						</div>
					</li>

					<?php
	}
	
}


	?>
				</ul>
			</div>
	<?php


}

?>










		</div>
	</div>
	<!-- 
Clients 
-->
	<section class="our_client">
		<hr class="soften" />
		<h4 class="title cntr"><span class="text">Manufactures</span></h4>
		<hr class="soften" />
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
	<?php include_once("./footer.php");?>