<?php
  session_start();
  require 'connect.php';

  
  if(isset($_GET['edit_id'])){
    $contact_id = $_GET['edit_id'];
    $update = true;
  $get_contact = mysqli_query($con, "SELECT * from Student WHERE Student_number = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

  
   if(isset($_POST['update'])){
    $Student_number = $_POST['Student_number'];
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Middle_initial = $_POST['Middle_initial'];
    $Birthday = $_POST['Birthday'];
    $Section = $_POST['Section'];
    $contact_id = $_GET['edit_id'];

    
    $update = "UPDATE `Student` SET Student_number=$Student_number,`First_name`='$First_name',`Last_name`='$Last_name',`Middle_initial`='$Middle_initial',`Birthday`='$Birthday',`Section`='$Section'  WHERE Student_number=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read_student.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <title>Lab_Exam</title>
<body>
    <h1>Student</h1>
     <h3>Edit Student</h3>
      <form action="edit_student.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">Student number</label>
      <input name="Student_number" type="text" value="<?php  echo $row[0]; ?>" class="form-control"   autofocus required>
  </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">First Name</label>
      <input name="First_name" type="text" value="<?php  echo $row[1]; ?>" class="form-control"     required>
     </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last Name</label>
      <input name="Last_name" type="text" value="<?php  echo $row[2];  ?>" class="form-control"     required>
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Middle Initial</label>
      <input name="Middle_initial" type="text" value="<?php echo  $row[3];  ?>" class="form-control"    required>
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Birthday</label>
      <input name="Birthday" type="text" value="<?php echo  $row[4];  ?>" class="form-control"    required>
     </div>
     <td>Section</td>
          <td>
          <select name="Section" required>
            <option value="">Select your Section</option>
          <?
            
              $sql = "SELECT * FROM Section";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['Section_id'] ?>"><?php echo $information['Section_name']; ?></option>
          <?php
            }
            ?>

          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read_student.php"><input class="btn" type="button" id="list_btn" value="List"/><br></a>
          </form>
    </form>
</body>
</html>
