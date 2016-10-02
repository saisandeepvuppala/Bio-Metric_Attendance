<!DOCTYPE>
<html>
<head>
<style>
table{
float:left;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","root","emplist");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$d= Array();

  for($t=1;$t<=31;$t++)
  {
  
	if($t<10)
{
$e='0'.$t;
$d[$t]='2015-05-'.$e;
}
else
{
$d[$t]='2015-05-'.$t;
}
  }
		require_once 'intern_trail_employee.php';
		$myfile = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
		$a= Array();
		$k= Array();
		$i=1;
		$k=0;
		$sql="select id from empatt1 where date='$d[6]' group by id";
		$result=mysqli_query($con,$sql);
		$p=0;
		while ($row=mysqli_fetch_row($result))
		{
		$a[$row[0]]=1;
		//echo $row[0]."<br>";
		$p++;
		}
		//echo "The value  of p is".$p."<br>";
		
		
		$p=0;
		while(isset($b[$i][1]))
		{
		if(isset($a[$b[$i][0]]))
		{
		
		$id=$b[$i][0];
		$name=$b[$i][1];
		//echo $id."<br>";
		$sql="INSERT INTO `may6`(`id`, `name`, `status`, `reason`) VALUES ('$id','$name','Present','')";
		$result=mysqli_query($con,$sql);
		if (!$result)
		{
		die('Invalid query: ' . mysql_error());
		}
		}
		else
		{
		$id=$b[$i][0];
		$name=$b[$i][1];
		$sql=$sql="INSERT INTO `may6`(`id`, `name`, `status`, `reason`) VALUES ('$id','$name','Absent','')";

		mysqli_query($con,$sql);
		}
		$i++;
		}
		echo "Thanks for inserting the all values into the database without the reason";
mysqli_close($con);
?> 
</body>

