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
		
		$sql="SELECT * FROM `may5`";
		$result=mysqli_query($con,$sql);
		$i=0;
		$name=Array();
		echo "<table><tr><th>Id</th><th>Name</th><th>$d[5]</th><th>Reason</th></tr>";
		while ($row=mysqli_fetch_row($result))
		{
		if($row[2]=='Present' || $row[2]=='present')
		{
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td><center>------</center></td></tr>";
		}
		else
		{
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		}
		$i++;
		}
		
		
mysqli_close($con);
?> 
</body>

