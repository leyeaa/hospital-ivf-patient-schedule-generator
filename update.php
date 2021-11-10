<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	session_start();
	error_reporting(E_ALL);
	include_once("func.inc.php");	
	/*if(!isset($_SESSION['memid'])){
		header("location: login.php");
	}else{
		$email=$_SESSION['email'];
		$memid=$_SESSION['memid'];
	}*/
	if(isset($_REQUEST["generate"])){
		$pno=$_REQUEST["pno"];
		$info=array($_REQUEST["pno"],$_REQUEST["pname"],$_REQUEST["tel"],$_REQUEST["add"],$_REQUEST["ptype"],$_REQUEST["lmp"],$_REQUEST["sp"],$_REQUEST["dob"]);
		//print_r($info);
		//exit();
		if(is_array($info)){
			input($info,"patientrecord");
			$mess="Patient Record Successfully Submitted [<a href=\"schedule.php?pno=$pno\" target=\"_blank\">Print Patient Schedule</a>]";
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Specialist Hospital & Fertility Center</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Medical Appointment Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<!--//fonts--> 
</head>
<body>
<!--background-->
<h1 style="margin: 5px 0px 0px 5px; font-size: 30px; letter-spacing: 3px;"><img src="images/logo.png" /><br> SPECIALIST HOSPITAL & FERTILITY CENTER</h1>
    <div class="bg-agile">
	<div class="book-appointment" style="padding-top: 20px;">
	<h2 style="padding:0px 0px 10px 0px; margin: 0px; font-size: 16px; color: #FFF; font-weight: bold; letter-spacing: 2.5px;">
	[<a href="index.php" style="color: #FF0;">&raquo;NEW PATIENT</a>]&nbsp;
	[<a href="update.php" style="color: #FF0;">&raquo;UPDATE RECORD</a>]&nbsp;
	[<a href="genschedule.php" style="color: #FF0;">&raquo;GENERATE SCHEDULE</a>]
	</h2>
	<?php
		if(isset($mess)){
			echo '<h2 style="padding:0px; margin: 0px; font-size: 16px; color: #FF0;">
					'.$mess.'
				</h2>';
		}elseif(isset($_REQUEST["mess"])){
			echo '<h2 style="padding:0px; margin: 0px; font-size: 16px; color: #FF0;">
					'.$_REQUEST["mess"].'
				</h2>';
		}	
	?>
	
	<h2>Patient Record Update</h2>
			<form action="updaterecord.php" method="post" target="_blank">
			<div class="left-agileits-w3layouts same">
			<div class="gaps">
				<p>PATIENT NUMBER</p>
					<input type="text" name="pno" placeholder="" required=""/>
			</div>
			</div>
			<div class="right-agileinfo same">
				<input type="submit" name="viewrec" value="View Record">
			</div>
			<div class="clear"></div>
			</form>
		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p>&copy; 2020.  Hospital . All Rights Reserved</p>
	        </div>
		<!--//copyright-->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

</body>
</html>