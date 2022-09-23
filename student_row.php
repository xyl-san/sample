<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$studentID = $_POST['id'];
		$sql ="SELECT student_id, name, address, email FROM `student` WHERE student_id = $studentID";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}
?>