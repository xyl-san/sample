<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$credit_notes_id = $_POST['id'];
		$sql = "SELECT crd.credit_notes_id as credit_notes_id, crd.credit_notes_code, crd.invoice_date,crd.due_date, crd.label,crd.quantity, crd.price, crd.tax, crd.subtotal, crd.total_amount, crd.currency, crd.payment_status, prod.product_id, prod.product_name,prod.product_description, emp.employee_id, emp.firstname, emp.lastname, cust.customer_id, cust.customer_firstname, cust.customer_lastname FROM credit_notes crd INNER JOIN product AS prod ON crd.product_id = prod.product_id INNER JOIN employees AS emp ON crd.employee_id = emp.employee_id INNER JOIN customer AS cust ON crd.customer_id = cust.customer_id WHERE credit_notes_id = '$credit_notes_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}
?>