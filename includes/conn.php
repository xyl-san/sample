<?php
	$conn = new mysqli('localhost', 'root', '', 'growth-with-relations');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>