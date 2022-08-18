<?php
	$conn = new mysqli('', 'vpd', 'caps!@#321', 'growth');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>