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
	

  
		$sql="insert into may5 values ($id,'$name','Present','',)";
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
		$sql="insert into may5 values ($id,'$name','Absent','',)";
		mysqli_query($con,$sql);
		}
		$i++;
		}
		echo "The value of p is".$p;
		
mysqli_close($con);
?> 
</body>

