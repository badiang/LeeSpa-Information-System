<?php
session_start();
require 'connect2.php';
	$sql = "SELECT * FROM service";
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
	<title>Lee Spa</title>
<body>
		<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
 	<a href="../main.html" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  	<a href="service.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i>
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a> 
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
  	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash"></i></a> 
</div>

>
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
							<td class="delete">
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