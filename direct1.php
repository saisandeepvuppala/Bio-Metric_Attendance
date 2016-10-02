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
session_start();
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
  $hod=$_SESSION["hod"];
  //echo "hod is ".$hod."<br>";
		$sql="SELECT id FROM `$hod` where accept='0'";
		$result=mysqli_query($con,$sql);
		
		
		while ($row=mysqli_fetch_row($result))
		{
		$id=$row[0];
		if($_POST[$id]!=1)
		{
		$sql="UPDATE `$hod` SET `accept`='-1' WHERE id='$id'";
		$r=mysqli_query($con,$sql);
		$sql="UPDATE `may6` SET `updation`='-1' WHERE id='$id'";
		$r=mysqli_query($con,$sql);
		}
		else
		{
		$sql="UPDATE `$hod` SET `accept`='1' WHERE id='$id'";
		$r=mysqli_query($con,$sql);
		$sql="UPDATE `may6` SET `updation`='1' WHERE id='$id'";
		$r=mysqli_query($con,$sql);
		}
		}
		
		session_destroy();
		
		echo "Thanks for updating status";
		
mysqli_close($con);
?> 
</body>

