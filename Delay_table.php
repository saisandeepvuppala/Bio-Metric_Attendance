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
		$faculty_without_class=['213','209','492','312','309'];
		$faculty_with_class=['139','132','219','379','802','311','310','305','138','215','307','222','313','702','461'];
            require_once 'intern_trail_employee.php';
            $myfile = fopen("1_attlog.DAT", "r") or die("Unable to open file!");
            $a=Array();
            echo "<table><tr><th>Id</th><th>Name</th><th>Date</th><th>Intime(08:00:00)</th><th>Outtime(18:00:00)</th></tr>";
			for($i=0;$i<20;$i++)
            {
            $a=fgets($myfile);
            $words   = preg_split('/\s+/', $a);
 
            $time1   = preg_split('/\:+/', $words[3]);
			$totaltime=$time1[0]*60+$time1[1];
			$intime=480;
			$outtime=1080;
			$k=0;
			foreach($faculty_without_class as $key )
			{
			if($words[1]==$key)
			{
			$k=1;
			break;
			}
			}
			echo "<tr><td>".$words[1]."</td>";
			$j=0;
			while(1)
			{
			if($words[1]==$b[$j][0])
			{
			echo "<td>".$b[$j][1]."</td><td>".$d[5]."</td>";
			break;
			}
			$j++;
			}
			
            if($totaltime<990)
			{
			if($totaltime>900)
			{
			if($k==1)
			{
			$totaltime=$totaltime-10;
			}
			$totaltime=$totaltime-900;
			echo "<td>late by ".$totaltime." Minutes</td><td></td></tr>";
			}
			else
			{
			echo "Ontime";
			}
			}
			else
			{
			if($totaltime<1080)
			{
			$totaltime=1080-$totaltime;
			echo "<td></td><td>left early by ".$totaltime." Minutes</td></tr>";
			}
			else
			{
			echo "<td></td><td>OnTime</td></tr>";
			}
			}
			}
            echo "</table>";
            mysqli_close($con);
         ?>
		 </body></html>