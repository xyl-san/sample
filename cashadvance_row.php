<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$cashadvance_id = $_POST['id'];
		$sql = "SELECT c.cashadvance_id, c.date_advance, c.amount, e.firstname, e.lastname FROM cashadvance c INNER JOIN employees as e on c.employee_id = e.employee_id WHERE cashadvance_id = '$cashadvance_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>