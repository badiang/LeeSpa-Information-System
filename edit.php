<?php
  session_start();
  require 'connect2.php';
  $contact_id = $_GET['edit_id'];
  
 	if(isset($_GET['edit_id'])){

	$get_contact = mysqli_query($con, "select * from service where servicecode = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
		$servicecode = $_POST['servicecode'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$duration = $_POST['duration'];
		$commission = $_POST['commission'];
		

    
    $update = "UPDATE `service` SET `servicecode`='$servicecode',`description`='$description',`price`='$price',`duration`='$duration',`commission`='$commssion' WHERE servicecode=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <title>Lee Spa</title>
<body>
    <h1>Service</h1>
     <h3>Edit Service</h3>
      <form action="edit.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">Service Code</label>
      <input name="servicecode" type="text" value="<?php  echo $row['servicecode'];  ?>" class="form-control" id="validationCustom01"   autofocus required>
  </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Description</label>
      <input name="description" type="text" value="<?php  echo $row['description'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="col-md-4 mb-3">
      <label for="validationCustom02">Price</label>
      <input name="price" type="text" value="<?php  echo $row['price'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="col-md-4 mb-3">
      <label for="validationCustom02">Duration</label>
      <input name="duration" type="text" value="<?php  echo $row['duration'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="col-md-4 mb-3">
      <label for="validationCustom02">Commission</label>
      <input name="commission" type="text" value="<?php  echo $row['commission'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 
	 
          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</body>
</html>
