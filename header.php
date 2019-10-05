<?php



include_once("./Models/MainModel.php");

$Main_OBJ = new MainModel;
$siteConfig = $Main_OBJ->getSiteConfig();


include_once("./Models/PagesModel.php");
$Page_OBJ = new PagesModel;



//SESSSION JOBS

if(!isset($_SESSION))
{
session_start();
}




if(isset($_SESSION["isLogin"]))
{
    $isUserLogin = true;
    

}
else
{
    $isUserLogin = false;
   
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

        $inputPassword = sha1($_POST["inputPassword"]);

        require_once("./Models/UsersModel.php");

        $Users_OBJ = new UsersModel;

        $result_UserLogin = $Users_OBJ->UserLogin($inputUsername,$inputPassword);

        if (count($result_UserLogin) > 0)
        {

		   
			$_SESSION["isLogin"] = true;
			$_SESSION["FirstName"] = $result_UserLogin[0]["firstName"];
			$_SESSION["LastName"] = $result_UserLogin[0]["lastName"];
            $isUserLogin = true;
            
           

        }
        else
        {
         
            $_SESSION["isLogin"] = false;
			$_SESSION["FirstName"] = $result_UserLogin[0]["firstName"];
            $_SESSION["LastName"] = $result_UserLogin[0]["lastName"];
            $isUserLogin = false;
			header ("Location: ./login.php ");
			die();

        }


	}

}
}
else if (isset($_POST['LogoutSubmit']))
{
	$isUserLogin = false;
session_destroy();

}

}


// LOGIN

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>
		<?php

		echo $siteConfig[0][1];

	?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap styles -->
	<link href="./assets/css/bootstrap.css" rel="stylesheet" />
	<!-- Customize styles -->
	<link href="./assets/style.css" rel="stylesheet" />
	<!-- font awesome styles -->
	<link href="./assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
	<link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>

				<a class="active" href="index.php"> <span class="icon-home"></span> Home</a>

				
				<?php 

 if ($isUserLogin && $_SESSION["isLogin"])
{
	?>
	<a href="#"><span class="icon-user"></span> My Account 
	<?php
				echo "[ ".$_SESSION["FirstName"]." ]";
}
				?>
				
				</a>
				<?php if ($isUserLogin && $_SESSION["isLogin"])
				{

				}
				else
				{
					?>
				<a href="register.php"><span class="icon-edit"></span> Free Register </a>

					<?php
				}

				?>
				<a href="contact.php"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart.php"><span class="icon-shopping-cart"></span> 2 Item(s) - <span
						class="badge badge-warning"> $448.42</span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
	<div id="gototop"> </div>
	<header id="header">
		<div class="row">
			<div class="span4">
				<h1>
					<a class="logo" href="index.php"><span>Twitter Bootstrap ecommerce template</span>
						<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
					</a>
				</h1>
			</div>
			<div class="span4">
				<div class="offerNoteWrapper">
					<h1 class="dotmark">
						<i class="icon-cut"></i>
						Twitter Bootstrap shopping cart HTML template is available @ $14
					</h1>
				</div>
			</div>
			<div class="span4 alignR">
				<p><br> <strong> Support (24/7) : 0800 1234 678 </strong><br><br></p>
				<span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span>
				<span class="btn btn-warning btn-mini">$</span>
				<span class="btn btn-mini">&pound;</span>
				<span class="btn btn-mini">&euro;</span>
			</div>
		</div>
	</header>

	<body>
		<!-- 
	Upper Header Section 
-->
		<!--
Navigation Bar Section 
-->
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="nav-collapse">
						<ul class="nav">

							<?php

				$result_Menus = $Page_OBJ->getMenus();

				foreach ($result_Menus as $key => $value) {
	
					?>
							<li class="<?php 
					
					if ($siteConfig[0][2].$value[2] == "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")
					{
					echo "active";
					}
					else
					{
						echo "";
					}
					?>
					"><a href="<?php echo $siteConfig[0][2].$value[2]; ?>"> <?php echo $value[1]; ?> </a></li>
							<?php
					
				}


			?>


							<!-- <li class=""><a href="list-view.html">List View</a></li>
			  <li class=""><a href="grid-view.html">Grid View</a></li>
			  <li class=""><a href="three-col.html">Three Column</a></li>
			  <li class=""><a href="four-col.html">Four Column</a></li>
			  <li class=""><a href="general.html">General Content</a></li> -->
						</ul>
						<form action="./search.php" method="GET" class="navbar-search pull-right">
							<input name="q" type="text" placeholder="Search" class="search-query span2">
						</form>
						<ul class="nav pull-right">

							<?php 
							
							if ($isUserLogin && $_SESSION["isLogin"])
							{
								?>
<form class="form-horizontal loginFrm" method="POST" action="">
<button type="submit" class="shopBtn btn-block" id="LogoutSubmit" name="LogoutSubmit">Logout</button>

</form>
								<?php
								
							}
							else
							{
							
							?>
							
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span
										class="icon-lock"></span> Login <b class="caret"></b></a>
								<div class="dropdown-menu">
									<form class="form-horizontal loginFrm" method="POST" action="">
										<div class="control-group">
											<input type="text" class="span2" id="inputEmail" name="inputEmail" placeholder="Email/Mobile">
										</div>
										<div class="control-group">
											<input type="password" class="span2" id="inputPassword" name="inputPassword"
												placeholder="Password">
										</div>
										<div class="control-group">
											<label class="checkbox">
												<input type="checkbox"> Remember me
											</label>
											<button type="submit" class="shopBtn btn-block" id="LoginSubmit" name="LoginSubmit">Sign in</button>
										</div>
									</form>
								</div>
							</li>
							<?php
							}

?>


						</ul>
					</div>
				</div>
			</div>
		</div>