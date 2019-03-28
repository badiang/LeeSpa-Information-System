<?php
  session_start();
  require 'connect2.php';
  $contact_id = $_GET['edit_id'];
  
  if(isset($_GET['edit_id'])){

  $get_contact = mysqli_query($con, "select * from customer_record where id = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

  
   if(isset($_POST['update'])){
    $date = $_POST['date'];
    $id_number = $_POST['id_number'];



    
    $update = "UPDATE `customer_record` SET `date`='$date',`id_number`='$id_number' WHERE id=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: customer_record.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <title>Le Spa</title>
<body>
    <h1>Customer</h1>
     <h3>Edit Customer Record</h3>
      <form action="edit_customer_record.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
   <label for="validationCustom01">Date</label>
   <input name="date" type="text" value="<?php  echo $row['date'];  ?>" class="form-control" id="validationCustom01"   autofocus required>
     </div> 
  <td>Customer Record</td>
          <td>
          <select name="id_number" required>
          <?
            
              $sql = "SELECT * FROM customer";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['id_number'] ?>"><?php echo $information['firstname']; ?></option>
          <?php
            }
            ?>
          </select>


          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read_customer_record.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</td>
</body>
</html>
