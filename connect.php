<?php
$conn = mysqli_connect('localhost','root','','LeeSpa');

if($conn == false){
	echo "Error : ". $conn . mysqli_connect_errno();
}

?>

