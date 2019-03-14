<?php
session_start();
require 'connect2.php';
	$sql = "SELECT * FROM employee";
	$records=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

	<title>Le Spa</title>
<body>
	<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
 	<a href="../main.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  	<a href="employee.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i>
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a> 
</div>

		<h1>List Of Employee</h1>
      <table>
      	<tr>
      		<th>ID Number</th>
      		<th>First Name</th>
			<th>Last Name</th>
			<th>Middle Initial</th>
            <th >Action</th>
      	</tr>
	       	<?php
      		while($information=mysqli_fetch_assoc($records)){
      			echo "<tr>";?>

						<td><?php echo $information['id_number'] ?></td>
						<td><?php echo ucfirst($information['firstname']) ?></td>
						<td><?php echo ucfirst($information['lastname']) ?></td>
						<td><?php echo ucfirst ($information['middle_name']) ?></td>
						<td>
								<td class="delete">
								<a  href="delete_employee.php?delete_id=<?php echo $information['id_number']; ?>">Delete</i></a>
						</td></td>
						<td>
							<td class="update">
							<a href="edit_employee.php?edit_id=<?php echo $information['id_number']; ?>">Edit</i></a>
							
								
						</td>
				
					</tr>


					</tr>
    	<?php
    		}
      	?>

      </table>


</body>
</html>