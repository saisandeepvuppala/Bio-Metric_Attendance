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
		//require_once 'intern_trail_employee.php';
		//$myfile = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
		$sql="SELECT id,name FROM `may6` where status='Absent'";
		$result=mysqli_query($con,$sql);
	
		while ($row=mysqli_fetch_row($result))
		{
		$id=$row[0];
		$name=$row[1];
		if(isset($_POST[$id]))
		{
		if($_POST[$id]!="")
		{
		$sql="UPDATE `may6` SET `reason`='$_POST[$id]' WHERE id='$id'";
		$r=mysqli_query($con,$sql);
		
		$hod="hod".(string)$id;
		$hod=$_POST[$hod];
	
		$sql="INSERT INTO `$hod`(`id`, `name`, `reason`, `accept`,`date1`) VALUES ('$id','$name','$_POST[$id]','0','$d[6]')";
		$r=mysqli_query($con,$sql);
		}
		}
		
		}
		
		echo "Thanks for updating status";
		
mysqli_close($con);
?> 
</body>

