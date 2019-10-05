<?php 

require_once("./header.php");

$_ERROR_MESS = "";



//REGISTER JOBS


if(!empty($_POST) && !empty($_POST["submitAccount"]))
{
    if(!empty($_POST["inputFname"]) && !empty($_POST["inputLname"]) 
    && !empty($_POST["Email"]) && !empty($_POST["Password"]) && !empty($_POST["inputCell"]))
    {

        $_title = trim($_POST["Title"]);
        if (!empty($_title))
        {
            $_title = null;
        }
        $_firstName = trim($_POST["inputFname"]);
        $_lastName = trim($_POST["inputLname"]);
        $_email = trim($_POST["Email"]);
        $_password = sha1($_POST["Password"]);
        $_cell= trim($_POST["inputCell"]);
        $_DOB_Y = trim($_POST["DOB_Year"]);
        $_DOB_M = trim($_POST["DOB_Month"]);
        $_DOB_D = trim($_POST["DOB_Day"]);




        if (!empty($_DOB_Y) && !empty($_DOB_M) && !empty($_DOB_D))
        {
        $_dob = strtotime($_DOB_Y."/".$_DOB_M."/".$_DOB_D);
        $_dob = date('Y-m-d h:i:s', $_dob);

        }
        else
        {
            $_dob = "NULL";
            
        }
        try
        {
        require_once("./Models/UsersModel.php");
        $Users_OBJ = new UsersModel();

    
        $result_reg = $Users_OBJ->UserRegister($_title,$_firstName,$_lastName,$_email,$_cell,$_password,null);

    
        
        if($result_reg == 1)
        {
			?>
			<?php
			header ("Location: ./login.php");
			die();
			?>
			<?php
        }
        else if ($result_reg == 2)
        {
            $_ERROR_MESS = "Your Email Or Cell is Exist in DB";
        }
        else
        {
            $_ERROR_MESS = "WE CANT REGISTER YOU ON DB";

        }
        }
    catch(Exception $e)
    {
		$_ERROR_MESS = $e->getMessage();
    }
    


    }
    else{

         $_ERROR_MESS = "YOU CANT SEND EMPTY VALUES TO ME!";
       
    }
}




//REGISTER JOBS



?>
<!-- 
Body Section 
-->
	<div class="row">

<?php

require_once("./cat_sidebar.php");


?>


	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" method="POST" action="">
		<h3>Your Personal Details</h3>

<?php 

if ($_ERROR_MESS != "")
{
	echo "<span style='color: red'><b>".$_ERROR_MESS."</b></span>";
}

?>

		<div class="control-group">
		<label class="control-label">Title </label>
		<div class="controls">
		<select class="span1" name="Title">
			<option value="">-</option>
			<option value="1">Mr.</option>
			<option value="2">Mrs</option>
			<option value="3">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname" name="inputFname" placeholder="First Name">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLname" name="inputLname" placeholder="Last Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" placeholder="Email" name="Email" id="Email">
		</div>
	  </div>
	  <div class="control-group">
			<label class="control-label" for="inputCell">Cell <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputCell" name="inputCell" placeholder="Cell Number">
			</div>
		 </div>

		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" placeholder="Password" name="Password" id="Password">
		</div>
	  </div>
		<div class="control-group">
		<label class="control-label">Date of Birth</label>
		<div class="controls">
		  <select class="span1" name="DOB_Year">
				<option value="">-</option>
					<option value="1999">1999&nbsp;&nbsp;</option>
					<option value="1998">1998&nbsp;&nbsp;</option>
					<option value="1997">1997&nbsp;&nbsp;</option>
					<option value="1996">1996&nbsp;&nbsp;</option>
					<option value="1995">1995&nbsp;&nbsp;</option>
					<option value="1994">1994&nbsp;&nbsp;</option>
					<option value="1993">1993&nbsp;&nbsp;</option>
			</select>
			<select class="span1" name="DOB_Month">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
					<option value="8">8&nbsp;&nbsp;</option>
					<option value="9">9&nbsp;&nbsp;</option>
					<option value="10">10&nbsp;&nbsp;</option>
					<option value="11">11&nbsp;&nbsp;</option>
					<option value="12">12&nbsp;&nbsp;</option>

			</select>
			<select class="span1" name="DOB_Day">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
		</div>
	  </div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
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
require_once("./footer.php");
?>