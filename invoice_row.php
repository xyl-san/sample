<?php 
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$invoice_id = $_POST['id'];
		$sql = "SELECT inv.invoice_id,inv.invoice_code, inv.product_id, inv.label, inv.account_id, inv.quantity, inv.price, inv.taxes, inv.subtotal, 
        inv.amount_total, inv.currency, inv.invoice_date,inv.due_date, inv.terms, inv.payment_reference, inv.employee_id, emp.firstname, emp.lastname, 
        prod.product_name, prod.product_description, cust.customer_id, cust.customer_firstname, cust.customer_lastname, acc.account_id, 
        acc.account_name, acc.description FROM invoice inv INNER JOIN employees AS emp ON inv.employee_id=emp.employee_id 
        INNER JOIN product AS prod ON inv.product_id = prod.product_id INNER JOIN customer AS cust ON inv.customer_id = cust.customer_id 
        INNER JOIN account_list AS acc on inv.account_id = acc.account_id WHERE invoice_id = '$invoice_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}
?>