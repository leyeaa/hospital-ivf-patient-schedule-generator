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
		$info=array($_REQUEST["pno"],$_REQUEST["pname"],$_REQUEST["tel"],$_REQUEST["add"],$_REQUEST["faculty"],$_REQUEST["lmp"],$_REQUEST["dept"],$_REQUEST["dob"]);
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
<title>Specialist Hospital & Fertility Center</title>
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
<script language="javascript">
var xmlHttp
var dStr;

function showHint(str) {
  var xhttp;
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "jamb.php?q="+str, true);
  xhttp.send();
}

function showCustomer(str)
{ 
dStr=str;
//alert(dStr);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

var url="gradescore.php";
var realStr=str.value;
url=url+"?id="+realStr;
//alert(url);
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function getIt(str)
	{ 
	dStr=str;
	var dsTitle=dStr.value;
	//alert(dsTitle);
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	  {
	  alert ("Your browser does not support AJAX!");
	  return;
	  } 
	
	var url="areaList2.php";
	url=url+"?state="+dsTitle;
	//alert(url);
	xmlHttp.onreadystatechange=stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	}

function stateChanged1() 
{ 
	if (xmlHttp.readyState==0 || xmlHttp.readyState==1 || xmlHttp.readyState==2 || xmlHttp.readyState==3)
	{ 
	//alert(dStr);
		document.getElementById('aCont').disabled=true;
		document.getElementById('aCont').innerHTML="...loading";
	}
	
	if (xmlHttp.readyState==4)
	{  
		var retVals=xmlHttp.responseText;
		//alert(retVals);
		document.getElementById('aCont').innerHTML=retVals;
		document.getElementById('aCont').disabled=false;
	}
}

function stateChanged() 
{ 

if (xmlHttp.readyState==0)
{ 
//alert(dStr);
	var strId= dStr.id;
	var strnId=strId.substring(4,5);
	var refCode="title"+strnId;
	//alert(strnId); 
	document.getElementById(refCode).value="loading...";
	alert(refCode);
}
if (xmlHttp.readyState==1)
{ 
//alert(dStr);
	var strId= dStr.id;
	var strnId=strId.substring(4,5);
	var refCode="title"+strnId; 
	document.getElementById(refCode).value="loading...";
}
if (xmlHttp.readyState==2)
{ 
//alert(dStr);
	var strId= dStr.id;
	var strnId=strId.substring(4,5);
	var refCode="title"+strnId; 
	document.getElementById(refCode).value="loading...";
}
if (xmlHttp.readyState==3)
{ 
//alert(dStr);
	var strId= dStr.id;
	var strnId=strId.substring(4,5);
	var refCode="title"+strnId; 
	document.getElementById(refCode).value="loading...";
}
if (xmlHttp.readyState==4)
{ 
//alert(dStr);
	var strId= dStr.id;
	var strnId=strId.substring(4,5);
	var refCode="title"+strnId; 
	document.getElementById(refCode).value=xmlHttp.responseText;
}

}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
</script>
<!--<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.mThumbnailScroller.min.js"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<script>
function getDept(val) {
	$.ajax({
	type: "POST",
	url: "get_dept.php",
	data:'faculty_id='+val,
	success: function(data){
		$("#dept-list").html(data);
	}
	});
}

function selectFaculty(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<script>
function getPreferredd(val) {
	$.ajax({
	type: "POST",
	url: "get_preferred.php",
	data:'preferredf_id='+val,
	success: function(data){
		$("#preferredd-list").html(data);
	}
	});
}

function selectPreferredf(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
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
		}	
	?>
	
	<h2>Patient Schedule Generation</h2>
			<form action="index.php" method="post">
			<div class="left-agileits-w3layouts same">
			<div class="gaps">
				<p>PATIENT NUMBER</p>
					<input type="text" name="pno" <?php echo 'value="'.patientID().'"'; ?> placeholder="" required=""/>
			</div>
			<div class="gaps">
				<p>PATIENT NAME</p>
					<input type="text" name="pname" placeholder="" required=""/>
			</div>
				<div class="gaps">	
				<p>PHONE NUMBER</p>
					<input type="text" name="tel" placeholder="" required=""/>
				</div>
			<div class="gaps">
				<p>ADDRESS</p>
					<input type="text" name="add" placeholder="" required=""/>
			</div>
			</div>
			<div class="right-agileinfo same">
			<div class="gaps">
				<p>PROTOCOL TYPE</p>	
					<select class="form-control" name="faculty" id="faculty-list" class="demoInputBox" onChange="getDept(this.value);">
						<option></option>
						<option>LONG</option>
						<option>SHORT</option>
						<option>RECIEPIENT(NON MENSTRATING)</option>
						<option>RECIEPIENT(MENSTRATING)</option>
					</select>
			</div>
			<div class="gaps">
				<p>STARTING POINT</p>	
					<select name="dept" id="dept-list" class="demoInputBox form-control">
						<option></option>
						<?php
						selectProtocol();
						?>
					</select>
			</div>
			<div class="gaps">
				<p>LMP/STARTING DATE</p>	
				<input type="date" name="lmp" required=""/>
				<!--<input  id="datepicker1" name="lmp" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd/mm/yyyy';}" required="">-->
			</div>
			<div class="gaps">
				<p>Date of Birth</p>
					<input type="date" name="dob" required=""/>
						<!--<input  id="datepicker2" name="dob" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd/mm/yyyy';}" required="">-->
			</div>
			</div>
			<div class="clear"></div>
						  <input type="submit" name="generate" value="Generate Schedule">
			</form>
		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p>&copy; 2020. Hospital . All Rights Reserved</p>
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