<?php
//database connection registrationsolutiong
function connet(){
	$connection=mysqli_connect("localhost","root","","paramount");
	//$connection=mysqli_connect("localhost","ac149e5_nwistem1","Groundbreaker@123","ac149e5_nwistemdb");
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
}
///////////////////////////////////////////////////////////////////////
//------------------------------------- #FUNCTION TO QUERY DATABASE.....#----------------------------------------------------
function result($query){
	$conn=mysqli_connect("localhost","root","","paramount");
	//$conn=mysqli_connect("localhost","ac149e5_nwistem1","Groundbreaker@123","ac149e5_nwistemdb");
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if(!$result=mysqli_query($conn,$query)){
	   $message=mysqli_error($conn);
	return $message;	
}	
else
{
	return $result;
}
}

function input($values, $table){
	$values[]=date("Y-m-d");
	$n=sizeof($values);//GET THE NUMBER OF PARAMETERS
	$reg_query="INSERT INTO $table Values (id,";
//BUILD UP QUERY DEPENDING ON THE NUMBER OF VALUES SENT....
	for($x=0; $x<$n; $x++){
	 $reg_query .="'".$values[$x]."',";
	} 
	$rev_query=strrev($reg_query);//reverse the query....
	$irev_query=substr($rev_query,1,strlen($reg_query));//strip the last comma....
	$auth_query=strrev($irev_query);//reverse the stripped query...
	$auth_query .=")";//add the closing bracket to the formatted query....
	$reg_result=result($auth_query);
	return $reg_result;
	//return $auth_query
}

function selectProtocol($curr=""){
	$query=result("SELECT pid, title FROM protocol WHERE typ='LONG'");
	while($protocol=mysqli_fetch_array($query)){
		echo '<option value="'.$protocol[0].'"'; if($protocol[0]==$curr){ echo ' selected '; } echo ' >'.$protocol[1].'</option>';
		/*if($protocol[1]=="LMP"){
			echo '<option value="12"'; if($curr==12){ echo 'selected'; } echo ' >HMG + GNRH (Stimulation + Downregulation)</option>';
		}*/
	}
}

function searchRecord($table,$field,$code){
	$query="SELECT * FROM $table WHERE $field='$code'";
	$queryResult=result($query);
	$s_row=mysqli_num_rows($queryResult);
	return $s_row;
}

function patientID(){
	$appno="PSH".substr(mt_rand(),0,5);	
	if(searchRecord("patientrecord","pno",$appno)==0){ //checking for existence of patient id
		$rcode=$appno;
	}else{
		$appno="PSH".substr(mt_rand(),0,5);
		$rcode=$appno;
	}
	return $rcode;
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getRecsAll($sql){
	$checkResult=result($sql);
	$rows=mysqli_num_rows($checkResult);
	if($rows>=1){
		while($ret=mysqli_fetch_array($checkResult)){
			$recs[]=$ret;
		}
		return $recs;
	}else{
		return 0;
	}
}

function getRecs($table,$field,$id){
	$checkQuery="SELECT * FROM $table WHERE $field='$id' ORDER BY id DESC LIMIT 0,1";
	$checkResult=result($checkQuery);
	$rows=mysqli_num_rows($checkResult);
	$recs=mysqli_fetch_array($checkResult);
	if($rows>=1){
		return $recs;
	}else{
		return 0;
	}
}

function getlastRec2($type,$dept){
	$query="SELECT pid FROM protocol WHERE typ='$type' AND department='$dept' ORDER BY rank DESC LIMIT 0,1";
	$result=result($query);
	$rec=mysqli_fetch_array($result);
	switch($rec){
		default:
			return $rec;
			break;
	}
}

function regID(){
	$checkResult=result("SELECT * FROM registration ORDER BY id DESC LIMIT 0,1");
	$rows=mysqli_num_rows($checkResult);
	$recs=mysqli_fetch_array($checkResult);
		if($rows==0){
		  $Code=(0+1);
		}else{
			$rec=substr($recs[1],5);
		  	$Code=($rec+1); 
		}
		$Code=sprintf("%06d",$Code);
		$use='NWIS'.$Code;
		return $use;
}

function directory($cat,$val=""){
	if($cat=="all"){
		$sql=result("SELECT * FROM registration ORDER BY id DESC");
	}else{
		$sql=result("SELECT * FROM registration WHERE $cat LIKE '%$val%' ORDER BY id DESC");
	}
	echo '<div style="text-align:justify; font-weight:normal;">';
	$tot=mysqli_num_rows($sql);
	$n=0;
	if($tot>0){
		echo '<div class="depthead">'.$tot.' Search Result(s)...</div>';
		while($ret=mysqli_fetch_array($sql)){
			$n+=1;
			echo '<div class="quotes4" style="color:#8D1516;">
				<table width="100%">
				<tr>';
			echo '<td valign="top"><strong>'.$n.'</strong></td><td><div style="background-image:url(images/minpixtemp2.jpg); background-repeat:no-repeat; height: 151px; width: 138px;">
				<img src="profile/'.$ret['passport'].'" height="128" width="115" align="left" hspace="2" vspace="2" style="padding:10px 5px 5px 10px;"/>
			</div></td><td valign="top" align="left" width="85%">
			<table style="line-height:2em;" width="100%">
			<tr style="background-color:#eee;">
			<td style="color: #005BAA; padding: 0px 5px;" width="20%">NAME:</td>
			<td style="color: #8D1516; padding: 0px 5px;">'.$ret['sname'].' '.$ret['oname'].'</td>
			</tr>
			<tr style="background-color:#fff;">
			<td style="color: #005BAA; padding: 0px 5px;">DESIGNATION:</td>
			<td style="color: #8D1516; padding: 0px 5px;">'.$ret['post'].'</td>
			</tr>
			<tr style="background-color:#fff;">
			<td style="color: #005BAA; padding: 0px 5px;">SPECIALIZATION:</td>
			<td style="color: #8D1516; padding: 0px 5px;">'.$ret['specialty'].'</td>
			</tr>
			<tr style="background-color:#eee;">
			<td style="color: #005BAA; padding: 0px 5px;">E-MAIL:</td>
			<td style="color: #8D1516; padding: 0px 5px;">'.$ret['email'].'</td>
			</tr>
			<tr style="background-color:#fff;">
			<td style="color: #005BAA; padding: 0px 5px;" colspan="2">
				<span class="fmenu">
					<a href="profile.php?sid='.$ret['id'].'" target="_blank">&rarr;&nbsp;View Details</a>
				</span>
			</td>
			</tr>
			</table>
			</td></tr>
			</table>';	
				echo '
			</div>';
				//end	
		}	
	}
    echo ' </div>';
}

function accStatusCheck($user,$pass){
	$user=trim($user);
	$pass=trim(md5($pass));
	$loginQuery="select * from registration where email='$user' AND pass='$pass'";
	$loginResult=result($loginQuery);
	$recordCount=mysqli_num_rows($loginResult);
	if($recordCount>=1){
		return 1;
	}else{
		return 0;
	}
}

function accLogin($user,$pass){
	$user=trim($user);
	$pass=trim(md5($pass));
	$loginQuery="select * from registration where email='$user' AND pass='$pass'";
	$loginResult=result($loginQuery);
	$recordCount=mysqli_num_rows($loginResult);
	if($recordCount>=1){
		$c_row=mysqli_fetch_array($loginResult);
		return $c_row;
	}else{
		return 0;
	}
}

?>