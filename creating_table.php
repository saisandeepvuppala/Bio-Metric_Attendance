<?php
$con=mysqli_connect("localhost","root","root","emplist");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$s='2015-05-05';
// Create table
$sql="CREATE TABLE may6(id INT,name varchar(30),status varchar(30),reason varchar(50))";

// Execute query
if (mysqli_query($con,$sql))
  {
  echo "Table persons created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
?> 
