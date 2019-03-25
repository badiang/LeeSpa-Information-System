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
		

    
    $update = "UPDATE `service` SET `servicecode`='$servicecode',`description`='$description',`price`='$price',`duration`='$duration',`commission`='$commission' WHERE servicecode=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
  <title>Lee Spa</title>
<body>
   <div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
  <a href="../main.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a>
</div>
<div class="container" style="width: 450px ; drop shadow rectangle">
     <h1>Edit Service</h1>
      <form action="edit.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="row">
          <div class="col-6">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">Service Code</label>
      <input name="servicecode" type="text" value="<?php  echo $row['servicecode'];  ?>" class="form-control" id="validationCustom01"   autofocus required>
  </div>
    </div>
     <div class="form-group">
      <label for="validationCustom02">Description</label>
      <input name="description" type="text" value="<?php  echo $row['description'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	  <div class="form-group">
      <label for="validationCustom02">Price</label>
      <input name="price" type="text" value="<?php  echo $row['price'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	  <div class="form-group">
      <label for="validationCustom02">Duration</label>
      <input name="duration" type="text" value="<?php  echo $row['duration'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="form-group">
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
