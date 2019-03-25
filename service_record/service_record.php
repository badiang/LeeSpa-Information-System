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
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="#">
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
<br><br>
    <table border="2px" width="30%" style="margin: 10px 100px;" >
      <td>
      <div class="form-row">
        <div class= "col-md-12">
		<h1>Service Record</h1>
  </div>
</div>
     <div class="form-row">
        <div class= "col-md-12">
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
        </div>
      </div>
        <br>
         <div class="form-row">
         <div class= "col-md-12">
          Types of Service
          <select name="servicecode" id="serviceType" required>
            <option  value="">Select Service</option>
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
          </div>
        </div>
        <br>
         <div class="form-row">
         <div class= "col-md-12">
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
          </div>
        </div>
           <br>
            <div class="form-row">
            <div class= "col-md-12">
        Payment
          <select id="payment" name="payment" required>
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
          </div>
        </div>
        <br>
         <div class="form-row">
         <div class= "col-md-12">
        Commission
          <select id="commission" name="commission" required>
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
    </div>
        <br>
             <div class="form-row">
           <div class= "col-md-6">
    			<form class="myform" method="post">
				    <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				    <a href ="read_service_record.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>

  				</form>
                </div>
                </div>
              </form>
        </td>
      </table>
    </div>
  </div>
</td>
</table>
    </br>
    <script src="jquery-3.3.1.min.js"></script>
    <script>
    	$('document').ready(function(){

        $('#serviceType').change(function(){
          serviceType = $(this).val();
          $.ajax({
            url: 'serviceType.php',
            type: 'POST',
            data:{
              'serviceType_button':1,
              'serviceType': serviceType
            },
            async: true,
            dataType: 'JSON',
            success: function(response,data){
              console.info(response);
              $('#payment').val(response.price);
              $('#commission').val(response.commission); 
            },
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          }); 
        });

      });
    </script>
  </body>
</html>

