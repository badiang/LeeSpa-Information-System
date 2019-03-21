<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
  $transaction = $_POST['transaction'];
  $servicecode = $_POST['servicecode'];
  $id_number = $_POST['id_number'];
  $commission = $_POST['commission'];
 
 
    $insert_information = "INSERT INTO `service_record` (`transaction`, `servicecode`, `id_number`, `commission`) VALUES ('$transaction', '$servicecode', '$id_number', '$commission')";
    
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="#">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"> 
</head>
	<title>Le Spa</title>
<body>
  <div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
  <a href="../main.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a> 
  </div> 
  <center>
		<h1>Service Record</h1>
		 <form class="needs-validation" action="" method='post'>
          Transaction Number
          <select name="transaction" required>
            <option value="">Transaction Number</option>
          <?
            
              $sql = "SELECT * FROM customer_record";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['id'] ?>"><?php echo $information['id_number']; ?></option>
          <?php
            }
            ?>
            
          </select>
        </br>
          Types of Service
          <select name="servicecode" required>
            <option value="">Select Service</option>
          <?
            
              $sql = "SELECT * FROM service";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['servicecode'] ?>"><?php echo $information['description']; ?></option>
          <?php
            }
            ?>

          
          </select>
        </br>
        Employee Name
          <select name="id_number" required>
            <option value="">Select Employee Name</option>
          <?
            
              $sql = "SELECT * FROM employee";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['id_number'] ?>"><?php echo $information['firstname']; ?></option>
          <?php
            }
            ?>
            
          
          </select>
           </br>
        Payment
          <select name="payment" required>
            <option value="">Select Employee Commission</option>
          <?
            
              $sql = "SELECT * FROM service";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['price'] ?>"><?php echo $information['price']; ?></option>
          <?php
            }
            ?>
            
          
          </select>
        </br>
        Commission
          <select name="commission" required>
            <option value="">Select Employee Commission</option>
          <?
            
              $sql = "SELECT * FROM service";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['commission'] ?>"><?php echo $information['commission']; ?></option>
          <?php
            }
            ?>
            
          
          </select>
        </br>


    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read_service_record.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
  				</form>
		</form>
</center>
</body>
</html>
