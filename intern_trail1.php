<!DOCTYPE html>
<html>
<head>
<style>
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
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require_once 'intern_trail_employee.php';
$myfile1 = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
echo "<table><tr><th>Name</th><th>ID</th><th>DATE</th><th>TIME</th></tr>";
for($j=0;$j<100;$j++)
{
$a= Array();
$a= fgets($myfile1);
$words= preg_split('/\s+/', $a);
$i=1;
while(1)
{
if (isset($b[$i][0]))
{
if($words[1]==$b[$i][0])
{
echo "<tr><td>".$b[$i][1]."</td>";
break;
}
else
{
$i++;
}
}
}
echo "<td>".$words[1]."</td>";
echo "<td>".$words[2]."</td>";
echo "<td>".$words[3]."</td></tr>";
}
echo "</table>";
fclose($myfile1);
?>

</body>
</html>

