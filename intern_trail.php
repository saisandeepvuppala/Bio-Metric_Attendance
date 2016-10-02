<!DOCTYPE html>
<html>
<body>

<?php
require_once 'intern_trail_employee.php';
$myfile = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
echo "<h3>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspID&nbsp&nbsp&nbsp&nbsp&nbspDATE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTIME<br></h3>";
for($j=0;$j<10;$j++)
{
$a= Array();
$a= fgets($myfile);
$words   = preg_split('/\s+/', $a);
$i=1;
while(1)
{
if($words[1]==$b[$i][0])
{
echo $b[$i][1]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
break;
}
else
{
$i++;
}
}
echo $words[1]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo $words[2]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo $words[3]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>";
}
fclose($myfile);
?>

</body>
</html>

