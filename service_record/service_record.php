<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
  /*$id = $_POST['id'];*/
  $servicecode = $_POST['servicecode'];
  $id_number = $_POST['id_number'];
  $commission = $_POST['commission'];

 
    $insert_information = "INSERT INTO `service_record` (`servicecode`,`id_number`,`commission` ) VALUES ( '$servicecode', '$id_number', '$commission')";
    
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
	<title>Le Spa</title>
<body>
		<h1>Service Record</h1>
		 <form class="needs-validation" action="" method='post'>
  			<div class="textbox">
				<!-- <div class="textbox">
                      <label for="validationCustom01">ID</label>
                      <input name="id" type="text" class="form-control" id="validationCustom01" autofocus required>
                  </div> -->
          <tr>
          <td>Types of Service</td>
          <td>
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

          
          </select></br>
          <tr>
          <td>Employee Name</td>
          <td>
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
            
          
          </select></br>
          <tr>
          <td>Commission</td>
          <td>
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


				
    		</div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read_service_record.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="../main.html">Home</a>
  				</form>
		</form>
  </td>
</tr>
</body>
</html>
