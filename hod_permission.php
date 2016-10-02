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
  $hod=$_POST["hod"];
  $_SESSION["hod"]=$_POST["hod"];
		//require_once 'intern_trail_employee.php';
		//$myfile = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
		echo "<form action='direct1.php' method='POST'>";
		$sql="SELECT * FROM `$hod` where accept=0";
		$result=mysqli_query($con,$sql);
		$i=0;
		$name=Array();
		echo "<table><tr><th>Id</th><th>Name</th><th>Date</th><th>Reason</th><th>Accept</th></tr>";
		while ($row=mysqli_fetch_row($result))
		{
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[4]."</td><td>".$row[2]."</td><td><input type='radio' name='$row[0]' value='1' required='required'>Yes &nbsp&nbsp&nbsp <input type='radio' name='$row[0]' value='-1' required='required'>No</td><td><input type='submit' value='submit'></td></tr>";
		}
		
		echo "</form>";
mysqli_close($con);
?> 
</body>

