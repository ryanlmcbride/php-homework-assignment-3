<?php
  $severname="localhost";
  $username="root";
  $password="";
  $schema="bdpaschools";
  $conn=mysqli_connect($severname, $username, $password, $schema);

  if($conn==false){
    die("Connection failed: " . $conn->connection_error);
  }
 ?>
