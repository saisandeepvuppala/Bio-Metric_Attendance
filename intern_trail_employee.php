<!DOCTYPE html>
<html>
<body>
<?php
$myfile = fopen("Employeelist.csv", "r") or die("Unable to open file!");
$b= Array();
while (!feof($myfile))
{
$b[] = fgetcsv($myfile);
}
fclose($myfile);
?>

</body>
</html>

