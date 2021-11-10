<?php
	session_start();
	error_reporting(0);
	include_once("func.inc.php");
	
	connet();
	if(!isset($_REQUEST["pno"]) || $_REQUEST["pno"]==""){
		header("location: index.php");
	}else{
		$pno=$_REQUEST["pno"];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
	body{
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
	}
	
	#waterMark{
	position:absolute;
	z-index:-10;
	top:25%;
	left:25%;
	width:405px;
	height:562px;
	
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Paramount Specialist Hospital & Fertility Center</title>

</head>

<body bgcolor="#ffffff">
<center>
<table width="95%" >
<?php
	echo
	'<tr>
			<td align="center" colspan="6">
				<span style="font-size:28px;font-weight:bold;">PARAMOUNT</span><br>
				<span style="font-size:20px;font-weight:bold;">Specialist Hospital & Fertility Center</span><br /><br />
					<img src="images/logo.jpg" width="80" align="bottom"/><br />
					<br />
						<span style="font-size:18px;font-weight:bold;">Patient Schedule</span>
			</td>
		</tr>';
$sql=result("SELECT * FROM patientrecord WHERE pno='$pno' ORDER BY id DESC LIMIT 0,1");
$ret=mysqli_fetch_array($sql);
echo "<tr>";
				echo '<td colspan="6" align="left" style="font-size:14px;">';
					echo '<table align="center" width="100%">';
						echo '<tr>
								<td align="left" width="25%">&nbsp;<b>PATIENT NO.:</b></b></td>
								<td align="left" width="30%" style="border-bottom:#000000 dotted 1px;">&nbsp;'.$ret[1].'</td> 
								<td align="left" width="15%"><b>PROTOCOL.:</b></td>				 
								<td align="left" width="30%" style="border-bottom:#000000 dotted 1px;" >&nbsp;'.$ret[5].'</td>
							</tr>';
							echo "<tr>";
							echo '<td align="left" width="20%">&nbsp;<b>NAME.:</b></td>';
							echo '<td align="left" width="80%" colspan="3" style="border-bottom:#000000 dotted 1px;">&nbsp;'.$ret[2].'</td>'; 
						echo '</tr>';
							echo '<tr>
								<td align="left" width="25%">&nbsp;<b>DATE OF BIRTH.:</b></td>
								<td align="left" width="30%" style="border-bottom:#000000 dotted 1px;">&nbsp;'.date("d-m-Y",strtotime($ret[8])).'</td> 
								<td align="left" width="15%"><b>PHONE NO.:</b></td>				 
								<td align="left" width="30%" style="border-bottom:#000000 dotted 1px;" >&nbsp;'.$ret[3].'</td>
							</tr>';
							echo "<tr>";
							echo '<td align="left" width="20%">&nbsp;<b>ADDRESS.:</b></td>';
							echo '<td align="left" width="80%" colspan="3" style="border-bottom:#000000 dotted 1px;">&nbsp;'.$ret[4].'</td>'; 
						echo '</tr>';
					echo '</table>';
				echo '</td>';
			echo '</tr>';
	
echo '
	<tr>
	<td colspan="6" width="100%" style="font-size:14px;">
	<table width="100%" style="background-color:#ccc;">
	<tr style="background-color:#fff;">
				<td align="left" width="10%" style="padding:5px 0px;"><b>S/N</b></td>
				<td align="left" width="65%" style="padding:5px 0px;"><b>TITLE</b></td>
				<td align="left" width="25%" style="padding:5px 0px;"><b>DATE</b></td> 
			</tr>';
	$psql=result("SELECT * FROM protocol WHERE typ='$ret[5]' AND pid>=$ret[7] ORDER BY pid ASC");
	$sn=0;
	$dat=$ret[6];
	while($rec=mysqli_fetch_array($psql)){
		$sn+=1;
		if($sn==1){
			$dat=$dat;
		}else{
			$dat=date('Y-m-d', strtotime($dat. ' + '.$rec[3].' days'));
		}
		
		//$dat=date("Y-m-d", strtotime($dat.'+'.$rec[2].' days'));
		echo '<tr style="background-color:#fff;">
				<td align="left" width="10%" style="padding:5px 0px;">'.$sn.'</td>
				<td align="left" width="65%" style="padding:5px 0px;">'.$rec[2].'</td>
				<td align="left" width="25%" style="padding:5px 0px;">'.date("d-m-Y",strtotime($dat)).'</td>
			</tr>';
	}
	echo '
	</table>
	<td>
	</tr>
	';
?>
</table>
</center>
</body>
</html>
