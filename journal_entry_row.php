<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$journal_id = $_POST['id'];
		$sql = "SELECT ji.journal_id, ji.account_id, ji.group_id, ji.amount,ji.date_created,j.code, al.description, gl.name,gl.status, gl.type FROM journal_items ji INNER JOIN journal_entries AS j ON ji.journal_id=j.journal_id INNER JOIN account_list AS al ON ji.journal_id=al.account_id INNER JOIN group_list AS gl ON ji.journal_id=gl.group_id WHERE a.journal_id = '$journal_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>