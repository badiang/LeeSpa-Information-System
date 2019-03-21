<?php
session_start();
require 'connect2.php';
	$records=mysqli_query($con,"SELECT * FROM service_record,service,employee  WHERE service_record.servicecode = service.servicecode and employee.id_number = service_record.id_number");

?>

<!DOCTYPE html>
<html>
	<title>Lee Spa</title>
<body>
	<a class="btn" href="../main.html">Home</a>
	<a class="btn" href="service_record.php">Add</a>
		<h1>Service Record</h1>
      <table>
      	<tr>
      		<th>#</th>
      		<th>Transaction Number</th>
      		<th>Description</th>
      		<th>Employee Name</th>
      		<th>Payment</th>
      		<th>Commission</th>
            <th >Action</th>
      	</tr>
	       	<?php
      		while($information=mysqli_fetch_assoc($records)){
      			echo "<tr>";?>
						<td><?php echo $information['id'] ?></td>
						<td><?php echo $information['transaction'] ?></td>
						<td><?php echo $information['description'] ?></td>
						<td><?php echo $information['firstname'] ?></td>
						<td><?php echo $information['price'] ?></td>
						<td><?php echo $information['commission'] ?></td>
						<td>
								<a href="delete_service_record.php?delete_id=<?php echo $information['id']; ?> &">Delete</i></a>
						</td>
						<td>
							<a href="edit_service_record.php?edit_id=<?php echo $information['id']; ?>">Edit</i></a>
						</td>
				
					</tr>


					</tr>
    	<?php
    		}
      	?>
      </table>
</body>
</html>