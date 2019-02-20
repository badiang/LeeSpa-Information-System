<?php
session_start();
require 'connect2.php';
	$sql = "SELECT * FROM employee";
	$records=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
	<title>Lee Spa</title>
<body>
	<a class="btn" href="main.html">Home</a>
	<a class="btn" href="employee.php">Add</a>
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
						<td><?php echo $information['firstname'] ?></td>
						<td><?php echo $information['lastname'] ?></td>
						<td><?php echo $information['middle_name'] ?></td>
						<td>
								<a href="delete_employee.php?delete_id=<?php echo $information['id_number']; ?>">Delete</i></a>
						</td>
						<td>
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