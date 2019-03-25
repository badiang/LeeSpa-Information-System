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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
    <h1>Customer Record</h1>
  </div>
</div>
<div class="form-row">
        <div class= "col-md-6">
     <form class="needs-validation" action="" method='post'>
              <label for="validationCustom01">Date</label>
              <input name="date" data-format='yyyy/mm/dd' type="date" class="form-control" id="validationCustom01" placeholder="Date"  autofocus required>
          </div>
        </div>
        <div class="form-row">
        <div class= "col-md-12">
          Customer Name
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
        </div>
      </div>

        </br>
        <div class="form-row">
           <div class= "col-md-6">

           <form class="myform" method="post">
                    <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
                    <a href ="read_customer_record.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                  </form>
                </div>
              </div>
            </form>
          </div>
        </div>
      </td>
    </table>
  </body>
  </html>
     
