<?php
  session_start();
  require 'connect2.php';
  $contact_id = $_GET['edit_id'];
  
 	if(isset($_GET['edit_id'])){

	$get_contact = mysqli_query($con, "select * from employee where id_number = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
		$id_number = $_POST['id_number'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
    $middle_name = $_POST['middle_name'];
		

    
    $update = "UPDATE `employee` SET `id_number`='$id_number',`firstname`='$firstname',`lastname`='$lastname',`middle_name`='$middle_name' WHERE id_number=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read_employee.php');
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
  <a href="../main.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a>
</div>
    <div class="login-box">
     <h1>Edit Employee List</h1>
      <form action="edit_employee.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
            <div class="textbox">
      <label for="validationCustom01">ID Number:</label>
      <input name="id_number" type="text" value="<?php  echo $row['id_number'];  ?>" class="form-control" id="validationCustom01"   autofocus required>
  </div>
    </div>
    <div class="col-md-4 mb-3">
            <div class="textbox">
      <label for="validationCustom02">First Name:</label>
      <input name="firstname" type="text" value="<?php  echo $row['firstname'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
	 <div class="col-md-4 mb-3">
          <div class="textbox">
      <label for="validationCustom02">Last Name:</label>
      <input name="lastname" type="text" value="<?php  echo $row['lastname'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
   <div class="col-md-4 mb-3">
          <div class="textbox">
      <label for="validationCustom02">Middle Initial:</label>
      <input name="middle_name" type="text" value="<?php  echo $row['middle_name'];  ?>" class="form-control"  id="validationCustom02"  value="" required>
     </div>
     
	 
	 
          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read_employee.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</body>
</html>
