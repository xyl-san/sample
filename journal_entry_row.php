<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$journal_id = $_POST['id'];
		$sql = "SELECT j.journal_id, j.account_id, j.group_id, j.amount, j.date_created ,je.code, a.account_name, g.group_name,g.status, g.type FROM `journal_items` j inner join account_list a on j.journal_id = a.account_id inner join journal_entries je on j.journal_id = je.journal_id inner join group_list g on j.journal_id = g.group_id WHERE j.journal_id = '$journal_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>