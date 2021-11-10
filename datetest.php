<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$mon="Jan";
	$yr="2020";
	$startMonth = "2020-02-03";
    $unix = strtotime($startMonth);
    $daysInMonth = date("t", $unix);
    $endMonth = sprintf("%s %s %s", $daysInMonth, $mon, $yr);

    // First and last day of month
    $firstDayOfMonth = date("N", strtotime($startMonth));
    $lastDayOfMonth = date("N", strtotime($endMonth));
	//echo $firstDayOfMonth;
	$a=5;
	/*
	for($i=1;$i<=$a;$i++){
		echo $i." x 2 = ".($i*2)."<br />";
		if($i%2==0 || $i==$a){
			echo "end <br />";
		}
	}
	$i=1;
	while($i<$firstDayOfMonth){
		echo $i." x 2 = ".($i*2)."<br />";
		$i++;
	}
	echo $i;*/
	$sub=29;
	$cd=date('Y-m-d', strtotime($startMonth. ' - '.$sub.' days'));
	echo $cd;
?>
</body>
</html>