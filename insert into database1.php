<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","root","emplist");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require_once 'intern_trail_employee.php';
$myfile1 = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
while(!feof($myfile1))
{
$a= Array();
$a= fgets($myfile1);
$words= preg_split('/\s+/', $a);
$i=1;															////Need to change the date each and every time;  
$q=6;
//for($q=$time;$q<=$time;$q++)
//{
if($q<10)
{
$e='0'.$q;
$w='2015-05-'.$e;
}
else
{
$w='2015-05-'.$q;
}

echo $w."<br>";
if($words[2]==$w)
{
$sql="select id,name from employeewithid where id=$words[1]";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_row($result);
$name=$row[1];
$sql="insert into may6empdetails values ('$words[1]','$name','$words[2]','$words[3]')";
mysqli_query($con,$sql);
}
}
fclose($myfile1);
mysqli_close($con);
?>

</body>
</html>

