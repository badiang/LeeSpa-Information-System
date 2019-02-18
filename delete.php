<?php

  require 'connect2.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from service where servicecode = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: read.php');
  }else {
    echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
  }


?>