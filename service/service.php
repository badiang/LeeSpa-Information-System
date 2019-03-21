<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
  $Servicecode = $_POST['servicecode'];
  $description = $_POST['description'];
	$price = $_POST['price'];
	$duration = $_POST['duration'];
	$commission = $_POST['commission'];
 
    $insert_information = "INSERT INTO `service` (`servicecode`, `description`, `price`, `duration`, `commission` ) VALUES ('$Servicecode', '$description', '$price','$duration', '$commission')";
    
    if (mysqli_query($con, $insert_information)) {
      echo"
        <script>
          alert('Data Inserted!!!')</script>";
    } else {
        echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
    }

      }


?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
	<title>Lab_Exam</title>
<body>
  <div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
  <a href="../main.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a> 
</div>
   <div class="login-box">
		<h1>Service</h1>
		 <form class="needs-validation" action="" method='post'>
  			<div class="textbox">
  				<div class="textbox">
				      <label for="validationCustom02">Service Code</label>
				      <input name="servicecode" type="text" class="form-control"  id="validationCustom05" placeholder="Service Code" value="" required>
    			</div>
    			<div class="textbox">
	      			<label for="validationCustom01">Description</label>
	      			<input name="description" type="text" class="form-control" id="validationCustom01" placeholder="Description"  autofocus required>
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">Price</label>
	      			<input name="price" type="text" class="form-control" id="validationCustom01" placeholder="Price"  autofocus required>
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">Duration</label>
	      			<input name="duration" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  >
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">Commission</label>
	      			<input name="commission" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  autofocus required>
    			</div>
				
    		</div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                   
  				</form>
		</form>
</body>
</html>
