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
		$faculty_without_class=['131','547','527','474','126'];
		$faculty_with_class=['309','461','499','215','355','519','132','102'];
            
            $a=Array();
            echo "<table><tr><th>Id</th><th>Name</th><th>Date</th><th>Intime(08:00:00)</th><th>Outtime(18:00:00)</th></tr>";
			
			for($i=0;$i<5;$i++)
			{
			
			$id=$faculty_without_class[$i];
			$sql="select * from may6empdetails where id=$id";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_row($result);
			$id=$row[0];
			$name=$row[1];
			$date=$row[2];
			$intime1=$row[3];
			
			$time   = preg_split('/\:+/',$intime1);
			$totaltime=$time[0]*60+$time[1];
			
			$intime=480;
			if(($totaltime-10)>480)
			{
			$intime1=$totaltime-$intime;
			}
			else
			{
			$intime1=0;
			}
			while ($row=mysqli_fetch_row($result))
			{
			$outime1=$row[3];
			}
			
			$time1   = preg_split('/\:+/',$outime1);
			$totaltime1=$time1[0]*60+$time1[1];
			
			
			//echo $outime1." ".$totaltime1."<br>";
			
			
			
			$outime=1080;
			if($totaltime1<1080)
			{
			$outime1=1080-$totaltime1;
			}
			else
			{
			$outime1=0;
			}
			
			if($intime1==0 && $outime1==0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> On Time </td><td> On Time</td></tr>";
			}
			elseif($intime1!=0 && $outime1==0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> Late By ".$intime1." Minutes </td><td> On Time</td></tr>";
			}
			elseif($intime1==0 && $outime1!=0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> On Time </td><td> Early by".$outime1." Minutes</td></tr>";
			}
			else
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> Late By ".$intime1." Minutes </td><td> Early By".$outime1." Minutes</td></tr>";
			}
			}
			
			
			
			
			
			
			
			
			
			
			
			for($i=0;$i<8;$i++)
			{
			
			$id=$faculty_with_class[$i];
			$sql="select * from may6empdetails where id=$id";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_row($result);
			$id=$row[0];
			$name=$row[1];
			$date=$row[2];
			$intime1=$row[3];
			
			$time1   = preg_split('/\:+/',$intime1);
			$totaltime=$time1[0]*60+$time1[1];
			
			$intime=480;
			if($totaltime>480)
			{
			$intime1=$totaltime-$intime;
			}
			else
			{
			$intime1=0;
			}
			while ($row=mysqli_fetch_row($result))
			{
			$outime1=$row[3];
			}
			
			$time1   = preg_split('/\:+/',$outime1);
			$totaltime1=$time1[0]*60+$time1[1];
			
			$outime=1080;
			if($totaltime1<1080)
			{
			$outime1=1080-$totaltime1;
			}
			else
			{
			$outime1=0;
			}
			
			if($intime1==0 && $outime1==0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> On Time </td><td> On Time</td></tr>";
			}
			elseif($intime1!=0 && $outime1==0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> Late By ".$intime1." Minutes </td><td> On Time</td></tr>";
			}
			elseif($intime1==0 && $outime1!=0)
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> On Time </td><td> Early by".$outime1." Minutes</td></tr>";
			}
			else
			{
			echo "<tr><td>".$id."</td><td>".$name."</td><td>".$date."</td><td> Late By ".$intime1." Minutes </td><td> Early By".$outime1." Minutes</td></tr>";
			}
			}
			echo "</table>";
			mysqli_close($con);
			?>
			</body>
			</html>
			