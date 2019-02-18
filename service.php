<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
    $Servicecode = $_POST['servicecode'];
    $description = $_POST['description'];
	$price = $_POST['price'];
	$duration = $_POST['duration'];
	$commission = $_POST['commission'];
 
    $insert_information = "INSERT INTO `service` (`servicecode`, `description`, `price`, `duration`, `commission` ) VALUES ('$Servicecode', '$description', '$price',
	'$duration', '$commission')";
    
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
	<title>Lab_Exam</title>
<body>
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
	      			<input name="duration" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  autofocus required>
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">Commission</label>
	      			<input name="commission" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  autofocus required>
    			</div>
				
    		</div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="main.html">Home</a>
  				</form>
		</form>
</body>
</html>
