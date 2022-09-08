<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$group_id = $_POST['id'];
		$sql = "SELECT group_id, name, description, type, status FROM group_list WHERE group_id = '$group_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>