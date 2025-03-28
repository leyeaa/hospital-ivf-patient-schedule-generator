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
<title>Specialist Hospital & Fertility Centre Software Application</title>
<link type="text/css" rel="stylesheet" href="mycss.css" />
</head>

<body bgcolor="#ffffff">
<center>
<table width="100%" >
<?php
	echo
	'<tr>
			<td align="center" colspan="6">
				<span style="font-size:28px;font-weight:bold;">IVF</span><br>
				<span style="font-size:20px;font-weight:bold;">Specialist Hospital & Fertility Centre</span><br /><br />
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
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>MONDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>TUESDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>WEDNESDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>THURSDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>FRIDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>SATURDAY</b></td>
				<td align="center" style="padding:5px 0px; width: 14.28%;"><b>SUNDAY</b></td>
			</tr>';
	$psql=result("SELECT * FROM protocol WHERE typ='$ret[5]' AND pid>=$ret[7] ORDER BY pid ASC");
	$sn=0;
	$dat=$ret[6];
	$events=array();
	$days=0;
	while($rec=mysqli_fetch_array($psql)){
		$sn+=1;
		$days+=$rec[3];
		if($sn==1){
			$dat=$dat;
		}else{
			$dat=date('Y-m-d', strtotime($dat. ' + '.$rec[3].' days'));
		}
		$events[$dat]=$rec[2];
		//$dat=date("Y-m-d", strtotime($dat.'+'.$rec[2].' days'));
		/*
		echo '<tr style="background-color:#fff;">
				<td align="left" width="10%" style="padding:5px 0px;">'.$sn.'</td>
				<td align="left" width="65%" style="padding:5px 0px;">'.$rec[2].'</td>
				<td align="left" width="25%" style="padding:5px 0px;">'.date("d-m-Y",strtotime($dat)).'</td>
			</tr>';
			*/
	}
	$fd = date("N", strtotime($ret[6]));
	$n=0;
	if($ret[5]=="LONG" && $ret[7]!=1){
		$llmpsql=result("SELECT SUM(days) FROM protocol WHERE typ='LONG' AND pid<=$ret[7]");
		list($lmpd)=mysqli_fetch_row($llmpsql);
		$lmpd=$lmpd;
		$lmp=date('Y-m-d', strtotime($ret[6]. ' - '.$lmpd.' days'));
		$ld=date("N", strtotime($lmp));
		$clmp=1;
	}else{
		$clmp=0;
	}
	if($clmp==1 && $ld>=$fd){
		echo '<tr style="background-color:#fff;">';
		for($k=1;$k<=7;$k++){
			echo '<td align="center" style="padding: 5px; width:14.28%;">'; 
				echo '<div class="quotes"><div style="padding:5px;">';
					if($k==$ld){
						echo '<span style="font-size:16px;">';
						echo date("M", mktime(0, 0, 0, substr($lmp,-5,2), 10));
						echo " - ";
						echo substr($lmp,-2);
						echo '</span>';
						echo '<br /><span style="color:#F00;">LMP</span>';
					}
			echo '</div></div>';
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '<tr style="background-color:#fff;">';
			$i=1;
			while($i<$fd){
				if($clmp==1 && $ld<$fd && $ld==$i){
					echo '<td align="center" style="padding: 5px; width:14.28%;">'; 
						echo '<div class="quotes"><div style="padding:5px;">';
								echo '<span style="font-size:16px;">';
								echo date("M", mktime(0, 0, 0, substr($lmp,-5,2), 10));
								echo " - ";
								echo substr($lmp,-2);
								echo '</span>';
								echo '<br /><span style="color:#F00;">LMP</span>';
					echo '</div></div>';
					echo '</td>';	
				}else{
					echo '<td align="center" style="padding: 5px; width:14.28%;">'; 
					echo '<div class="quotes"><div style="padding:5px;">&nbsp;';
					echo '</div></div>';
					echo '</td>';
				}
				$i++;
			}
			for($a=0;$a<=$days;$a++){
				if($a==0){
					$cd=$ret[6];
				}else{
					$cd=date('Y-m-d', strtotime($cd. ' + 1 days'));
				}
				echo '<td align="center" style="padding: 5px; width:14.28%;">'; 
				echo '<div class="quotes"><div style="padding:5px;"><span style="font-size:16px;">';
						echo date("M", mktime(0, 0, 0, substr($cd,-5,2), 10));
						echo " - ";
						echo substr($cd,-2);
				echo '</span>';
				if(array_key_exists($cd,$events )){
					echo '<br /><span style="color:#F00;">'.$events[$cd].'</span>';
				}
				echo '</div></div>';
				echo '</td>';
				if($i%7==0){
					echo '</tr>';
					if($a<$days){
						echo '<tr style="background-color:#fff;">';
					}
				}
				if($i%7!=0 || $a<$days){
					$i++;
				}
			}
			if($i%7!=0){
				$b=$i%7;
				while($b<=7){
					echo '<td align="center" style="padding: 5px; width:14.28%;">'; 
					echo '<div class="quotes"><div style="padding:5px;">&nbsp;';
					echo '</div></div>';
					echo '</td>';
					$b++;
				}
				echo '</td>';
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
