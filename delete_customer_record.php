<?php

  require 'connect.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from Student where Student_number  = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: read_student.php');
  }else {
    echo "Error: " . $insert_instructor . "<br>" . mysqli_error($con);
  }


?>