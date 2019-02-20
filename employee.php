<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
    $id_number = $_POST['id_number'];
    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middle_name = $_POST['middle_name'];
	
 
    $insert_information = "INSERT INTO `employee` (`id_number`, `firstname`, `lastname`, `middle_name` ) VALUES ('$id_number', '$firstname','$lastname','$middle_name')";
    
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
		<h1>Add New Employee</h1>
		 <form class="needs-validation" action="" method='post'>
  			<div class="textbox">
				<div class="textbox">
	      			ID Number
	      			<input name="id_number" type="text" class="form-control" id="validationCustom01" placeholder="Employee ID Number"  autofocus required>
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">First Name</label>
	      			<input name="firstname" type="text" class="form-control" id="validationCustom01" placeholder="First Name"  autofocus required>
    			</div>
				<div class="textbox">
	      			<label for="validationCustom01">Last Name</label>
	      			<input name="lastname" type="text" class="form-control" id="validationCustom01" placeholder="Last Name"  autofocus required>
    			</div>
    			<div class="textbox">
	      			<label for="validationCustom01">Middle Initial</label>
	      			<input name="middle_name" type="text" class="form-control" id="validationCustom01" placeholder="Middle Initial"  autofocus required>
    			</div>
				
    		</div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read_employee.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="main.html">Home</a>
  				</form>
		</form>
</body>
</html>
