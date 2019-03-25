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
    <h1>Service</h1>
     <form class="needs-validation" action="" method='post'>
       <div class="row">
          <div class="col-6">
           <label for="validationCustom02">Service Code</label>
              <input name="servicecode" type="text" class="form-control"  id="validationCustom05" placeholder="Service Code" value="" required>
            </div>
          </div>
              <div class="form-group">
             <label for="validationCustom01">Description</label>
              <input name="description" type="text" class="form-control" id="validationCustom01" placeholder="Description"  required>
            </div>
              <div class="form-group">
            <label for="validationCustom01">Price</label>
              <input name="price" type="text" class="form-control" id="validationCustom01" placeholder="Price"   required>
            </div>
              <div class="form-group">
               <label for="validationCustom01">Duration</label>
              <input name="duration" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  >
                </div>
                 <div class="form-group">
            <label for="validationCustom01">Commission</label>
              <input name="commission" type="text" class="form-control" id="validationCustom01" placeholder="Duration"  autofocus required>
                </div>
          <form class="myform" method="post">
                  <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
                    <a href ="read.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
          </form>
    </form>
</div>
</body>
</html>