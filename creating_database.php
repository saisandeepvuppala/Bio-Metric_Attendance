<?php
$con=mysqli_connect("localhost","root","root");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql="CREATE DATABASE emplist";
if (mysqli_query($con,$sql))
  {
  echo "Database my_db2 created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
?> 

