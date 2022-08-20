<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$deduction_id = $_POST['id'];
		$sql = "SELECT d.deduction_id, d.description, d.amount, e.firstname, e.lastname FROM deductions d INNER JOIN employees as e on d.deduction_id=e.employee_id WHERE deduction_id = '$deduction_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>
