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
<?php
  if(isset($_SESSION['username'])){
    echo '';
  }
  else{
    header("location: ../login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"> 
</head>
	<title>Le Spa</title>
<body>
<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
  <a href="../main.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
  <a href="../employee/employee.php" class="w3-bar-item w3-button"><i class="fa fa-address-book"></i></a> 
  <a href="../customer/customer.php" class="w3-bar-item w3-button"><i class="fa fa-address-book"></i></a>
  <a href="../service/service.php" class="w3-bar-item w3-button"><i class="fa fa-user-secret"></i></a>
  <a href="../customer_record/customer_record.php" class="w3-bar-item w3-button"><i class="fa fa-bookmark"></i></a>
  <a href="../service_record/service_record.php" class="w3-bar-item w3-button"><i class="fa fa-cogs"></i></a>
  </div> 
      <div class="container" style="width: 450px ; drop shadow rectangle">
		<h1>Add New Employee</h1>
		 <form class="needs-validation" action="" method='post'>
       <div class="row">
          <div class="col-6">
	      			ID Number
	      			<input name="id_number" type="text" class="form-control" id="validationCustom01" placeholder="Employee ID Number"  autofocus required>
            </div>
          </div>
              <div class="form-group">
	      			<label for="validationCustom01">First Name</label>
	      			<input name="firstname" type="text" class="form-control" id="validationCustom01" placeholder="First Name"  autofocus required>
            </div>
              <div class="form-group">
	      			<label for="validationCustom01">Last Name</label>
	      			<input name="lastname" type="text" class="form-control" id="validationCustom01" placeholder="Last Name"  autofocus required>
            </div>
              <div class="form-group">
	      			<label for="validationCustom01">Middle Initial</label>
	      			<input name="middle_name" type="text" class="form-control" id="validationCustom01" placeholder="Middle Initial">
                </div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read_employee.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
  				</form>
		</form>
</div>
</body>
</html>
