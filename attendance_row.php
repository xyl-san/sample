<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$attendance_id = $_POST['id'];
		$sql = "SELECT a.attendance_id, a.status, a.date, a.time_in, a.time_out, e.employee_code,e.firstname, e.lastname from attendance a INNER JOIN employees as e on  e.employee_id=a.employee_id WHERE a.attendance_id = '$attendance_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>