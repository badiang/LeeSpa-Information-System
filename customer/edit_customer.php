<?php
  session_start();
  require 'connect2.php';
  $contact_id = $_GET['edit_id'];
  
 	if(isset($_GET['edit_id'])){

	$get_contact = mysqli_query($con, "select * from customer where id_number = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
  	$id_number = $_POST['id_number'];
  	$firstname = $_POST['firstname'];
  	$lastname = $_POST['lastname'];
    $middle_initial = $_POST['middle_initial'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    $update = "UPDATE `customer` SET `id_number`='$id_number',`firstname`='$firstname',`lastname`='$lastname',`middle_initial`='$middle_initial',`address`='$address',`contact`='$contact' WHERE id_number=".$contact_id;
    if (mysqli_query($con, $update)) {
      header('location: read_customer.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <title>Lee Spa</title>
<body>
  
    <h1>Customer</h1>
     <h3>Edit Customer List</h3>
      <form action="edit_customer.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">ID Number</label>
      <input name="id_number" type="text" value="<?php  echo $row['id_number'];  ?>" class="form-control" id="validationCustom01"   autofocus required>
  </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">First Name</label>
      <input name="firstname" type="text" value="<?php  echo $row['firstname'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last Name</label>
      <input name="lastname" type="text" value="<?php  echo $row['lastname'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
   <div class="col-md-4 mb-3">
      <label for="validationCustom02">Middle Initial</label>
      <input name="middle_initial" type="text" value="<?php  echo $row['middle_initial'];  ?>" class="form-control"  id="validationCustom02"  value="">
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Address</label>
      <input name="address" type="text" value="<?php  echo $row['address'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Contact</label>
      <input name="contact" type="text" value="<?php  echo $row['contact'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read_customer.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</body>
</html>
