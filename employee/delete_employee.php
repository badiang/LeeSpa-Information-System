<?php

  require 'connect2.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from employee where id_number = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: read_employee.php');
  }else {
    echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
  }


?>