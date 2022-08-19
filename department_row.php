<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$department_id = $_POST['id'];
		$sql = "SELECT department_id, department_name, created_on, updated_on FROM department WHERE department_id = '$department_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>