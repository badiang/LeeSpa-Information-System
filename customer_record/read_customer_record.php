<?php
session_start();
require 'connect2.php';
	$records=mysqli_query($con,"SELECT * FROM customer_record, customer WHERE customer_record.id_number = customer.id_number"); 

?>

<!DOCTYPE html>
<html>
	<title>Lee Spa</title>
<body>
	<a class="btn" href="../main.html">Home</a>
	<a class="btn" href="customer_record.php">Add</a>
		
			<h1>Customer Record</h1>
      <table class="table table-bordered table-hover table-striped" >
      	<tr>
      		<th>#</th>
      		<th>Date</th>
      		<th>Customer Name</th>
            <th colspan='2'>Action</th>
      	</tr>
	       	<?php $i=1;
      		while($information=mysqli_fetch_array($records)){
      			echo "<tr>";?>
						<td><?php echo $i; $i++; ?></td>
						<td><?php echo $information['date'] ?></td>
						<td><?php echo $information['firstname'] ?></td>
						<td>
								<a href="delete_customer_record.php?delete_id=<?php echo $information['id_number']; ?>">Delete</i></a>
						</td>
						<td>
							<a href="edit_customer_record.php?edit_id=<?php echo $information['id']; ?>">Edit</i></a>
						</td>
					</tr>


					</tr>
    	<?php
    		}
      	?>
      </table>
</body>
</html>