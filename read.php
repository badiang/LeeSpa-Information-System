<?php
session_start();
require 'connect2.php';
	$sql = "SELECT * FROM service";
	$records=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
	<title>Lee Spa</title>
<body>
	<a class="btn" href="main.html">Home</a>
	<a class="btn" href="service.php">Add</a>
		<h1>Service</h1>
      <table>
      	<tr>
      		<th>Service Code</th>
      		<th>Description</th>
			<th>Price</th>
			<th>Duration</th>
			<th>Commission</th>
            <th >Action</th>
      	</tr>
	       	<?php
      		while($information=mysqli_fetch_assoc($records)){
      			echo "<tr>";?>

						<td><?php echo $information['servicecode'] ?></td>
						<td><?php echo $information['description'] ?></td>
						<td><?php echo $information['price'] ?></td>
						<td><?php echo $information['duration'] ?></td>
						<td><?php echo $information['commission'] ?></td>
						<td>
								<a href="delete.php?delete_id=<?php echo $information['servicecode']; ?>">Delete</i></a>
						</td>
						<td>
							<a href="edit.php?edit_id=<?php echo $information['servicecode']; ?>">Edit</i></a>
						</td>
				
					</tr>


					</tr>
    	<?php
    		}
      	?>
      </table>
</body>
</html>