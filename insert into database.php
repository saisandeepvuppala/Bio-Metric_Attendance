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
$i=1;
$time=31;															////Need to change the date each and every time;  
for($q=$time;$q<=$time;$q++)
{
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
while(1)
{
if (isset($b[$i][0]))
{
if($words[1]==$b[$i][0])
{
 $name=$b[$i][1];
break;
}
else
{
$i++;
}
}
}
$sql="insert into empatt1 values ('$words[1]','$name','$words[2]','$words[3]')";
mysqli_query($con,$sql);
}
}
}
fclose($myfile1);
mysqli_close($con);
?>

</body>
</html>

