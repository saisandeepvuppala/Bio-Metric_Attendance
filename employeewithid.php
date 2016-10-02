<!DOCTYPE html>
<html>
<body>

<?php
$con=mysqli_connect("localhost","root","root","emplist");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require_once 'intern_trail_employee.php';
$i=1;
while(isset($b[$i][0]))
{
$id=$b[$i][0];
$name=$b[$i][1];
$sql="INSERT INTO `employeewithid`(`sno`, `id`, `name`) VALUES ('$i','$id','$name')";
mysqli_query($con,$sql);
$i++;
}
?>

</body>
</html>

