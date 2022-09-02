<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$journal_id = $_POST['id'];
		$sql = "SELECT j.journal_id, j.account_id, j.group_id, j.amount, j.date_created, al.description, ag.name, ag.type FROM journal_items j INNER JOIN account_list AS al ON j.journal_id=al.account_id INNER JOIN group_list AS ag ON j.journal_id=ag.group_id  WHERE j.journal_id = '$journal_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>