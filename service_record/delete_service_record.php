<?php

  require 'connect2.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from service_record where id = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: read_service_record.php');
  }else {
    echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
  }


?>