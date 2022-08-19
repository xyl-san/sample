<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$job_id = $_POST['id'];
		$sql = "SELECT job_id, description, rate, created_on, updated_on FROM job WHERE job_id = '$job_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>