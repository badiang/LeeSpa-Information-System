<?php

  require 'connect2.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from customer_record where id_number  = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: read_customer_record.php');
  }else {
    echo "Error: " . $insert_instructor . "<br>" . mysqli_error($con);
  }


?>