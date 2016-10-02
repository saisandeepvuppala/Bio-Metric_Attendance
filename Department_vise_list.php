<!DOCTYPE html>
<html>
<body>
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
<?php
$myfile = fopen("Employeelist.csv", "r") or die("Unable to open file!");
$b= Array();
while (!feof($myfile))
{
$b[] = fgetcsv($myfile);
}

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
  
$a=Array();
$a=['Administration','Apparel','contract','Consultant','Control','Control And Automation','PW','Tchmahindra','IT','Security','Marketing','placement','Mechanical','Infra And Env','RD'];
$num=count($a);
echo "<table><tr><th>Id</th><th>Name</th><th>Department</th><th>$d[5]</th></tr>";
for($i=0;$i<15;$i++)
{
$j=1;
while(isset($b[$j][1]))
{
if($b[$j][4]==$a[$i])
{
$id=$b[$j][0];
$sql="select name from empatt1 where date='$d[5]' and id='$id' group by name";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_row($result);
if($row[0]==$b[$j][1])
{

echo "<tr><td>".$b[$j][0]."</td><td>".$b[$j][1]."</td><td>".$b[$j][4]."</td><td>Present</td></tr>";

}
else
{


echo "<tr><td>".$b[$j][0]."</td><td>".$b[$j][1]."</td><td>".$b[$j][4]."</td><td>Absent</td></tr>";


}

}
$j++;
}

echo "<tr><td>-------</td><td>-------</td><td>-------</td><td>-------</td></tr>";
}
echo "</table>";
fclose($myfile);
?>

</body>
</html>

