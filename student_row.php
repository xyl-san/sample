<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$studentID = $_POST['id'];
		$sql ="SELECT stu.student_id AS student_id, stu.name, stu.address, stu.email, cur.description, cur.duration, cur.course_id FROM student stu INNER JOIN course AS cur ON stu.course_id =cur.course_id WHERE student_id = $studentID";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}
?>