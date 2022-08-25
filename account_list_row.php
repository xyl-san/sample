<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$account_id = $_POST['id'];
		$sql = "SELECT account_id, name, description, status FROM account_list WHERE account_id = '$account_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>