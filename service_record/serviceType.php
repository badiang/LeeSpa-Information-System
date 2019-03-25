<?php
	require 'connect2.php';
 	if(isset($_POST['serviceType_button']))
 	{

		$serviceType = $_POST['serviceType'];
		$query = "SELECT * FROM `service` where servicecode = '$serviceType'";
		$sql = mysqli_query($con, $query);
		$result = mysqli_fetch_array($sql);

		$service["price"] = $result['price'];
		$service['commission'] = $result['commission'];


		echo json_encode($service);


 	}