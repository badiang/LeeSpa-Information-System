<?php
  session_start();
  require 'connect2.php';
  $contact_id = $_GET['edit_id'];
  
 	if(isset($_GET['edit_id'])){

	$get_contact = mysqli_query($con, "select * from service_record where id = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
	$id = $_POST['id'];
		$servicecode = $_POST['servicecode'];
    $id_number = $_POST['id_number'];



    
    $update = "UPDATE `service_record` SET `id`='$id',`servicecode`='$servicecode',`id_number`='$id_number' WHERE id=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read_service_record.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
  <title>Le Spa</title>
<body>
    <h1>Service</h1>
     <h3>Edit Service Record</h3>
      <form action="edit_service_record.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <td>ID</td>
          <td>
          <select name="id" required>
          <?
            
              $sql = "SELECT * FROM customer_record";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['id'] ?>"><?php echo $information['id']; ?></option>
          <?php
            }
            ?>
          </select></br>
  <td>Service Code</td>
          <td>
          <select name="servicecode" required>
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

  <td>Employee Name</td>
          <td>
          <select name="id_number" required>
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
           <td>Commission</td>
          <td>
          <select name="commission" required>
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



          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update" autofocus required />
                    <a href ="read_service_record.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</td>
</body>
</html>
