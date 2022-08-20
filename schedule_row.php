<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$schedule_id = $_POST['id'];
		$sql = "SELECT s.schedule_id, s.time_in, s.time_out, e.employee_code, e.firstname, e.lastname FROM schedules s INNER JOIN employees as e on s.schedule_id=e.schedule_id WHERE s.schedule_id = '$schedule_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>
