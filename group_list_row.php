<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$accountgroup_id = $_POST['id'];
		$sql = "SELECT accountgroup_id, name, description, type, status FROM group_list WHERE accountgroup_id = '$accountgroup_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>