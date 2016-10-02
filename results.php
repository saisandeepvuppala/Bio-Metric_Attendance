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
 require_once 'intern_trail_employee.php';
		$sql="select id,name,date from empatt1 where date='$d[5]' group by id";
		$result=mysqli_query($con,$sql);
		$a= Array();
		echo "<table><tr><th>Id</th><th>Name</th>"./*<th>.$d[5].</th>.*/"</tr>";
		while ($row=mysqli_fetch_row($result))
		{
		$a[]=$row[0];
		}
		$i=1;
		while(isset($b[$i][1]))
		{
		foreach($a as $key)
		{
		if($key==$b[$i][0])
		{
		echo "<tr><td>".$b[$i][0]."</td><td>".$b[$i][1];//"</td><td>Present</td</tr>";
		goto l1;
		}
		}
		echo "<tr><td>".$b[$i][0]."</td><td>".$b[$i][1];//"</td><td>Absent</td</tr>";
		l1:
		$i++;
		}
		echo "</table>";
		
		
		
		for($y=5;$y<17;$y++)
		{
		
		$sql="select id,name,date from empatt1 where date='$d[$y]' group by id";
		$result=mysqli_query($con,$sql);
		$a= Array();
		echo "<table><tr><th>".$d[$y]."</th></tr>";
		while ($row=mysqli_fetch_row($result))
		{
		$a[]=$row[0];
		}
		$i=1;
		while(isset($b[$i][1]))
		{
		foreach($a as $key)
		{
		if($key==$b[$i][0])
		{
		echo "<tr><td>Present</td</tr>";
	goto l2;
		}
		}
		echo "<tr><td>Absent</td</tr>";
		l2:
		$i++;
		}
		echo "</table>";
		}
		
		
mysqli_close($con);
?> 
</body>

