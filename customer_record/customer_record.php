<?php
  session_start();
  require 'connect2.php';
  if(isset($_POST['save'])){
    $date = $_POST['date'];
    $id_number = $_POST['id_number'];
    

    $insert_information = "INSERT INTO `customer_record` (`date`, `id_number`) VALUES ( '$date', '$id_number')";
    
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
  <title>Lee Spa</title>
<body>
    <h1>Customer Record</h1>
     <form class="needs-validation" action="" method='post'>
        <div class="textbox">
        </div>
          <div class="textbox">
              <label for="validationCustom01">Date</label>
              <input name="date" data-format='yyyy/mm/dd' type="date" class="form-control" id="validationCustom01" placeholder="Date"  autofocus required>
          </div>
        </div>
         <tr>
          <td>Customer Name</td>
          <td>
          <select name="id_number" required>
            <option value="">Select Customer Name</option>
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
                    <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
                    <a href ="read_customer_record.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="../main.html">Home</a>
          </form>
        </td>
      </tr>
           
    </form>
</body>
</html>
