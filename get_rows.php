<?php 

	if(isset($_POST['empRow'])){
        include 'includes/conn.php';
		$employee_id = $_POST['id'];
		$sql = "SELECT e.employee_id, e.photo, e.employee_code, e.firstname, e.lastname, e.address, e.birthdate, e.contact_info, e.gender, e.delete_flag, e.created_on,d.department_id, d.department_name, j.job_id, j.job_name, s.schedule_id, s.time_in, s.time_out FROM employees e INNER JOIN department as d on e.department_id=d.department_id INNER JOIN job as j on e.job_id=j.job_id INNER JOIN schedules as s on e.schedule_id=s.schedule_id WHERE e.employee_id = '$employee_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
        $conn->close();
	}

	if(isset($_POST['attRow'])){
        include 'includes/conn.php';

		$attendance_id = $_POST['id'];
		$sql = "SELECT a.attendance_id, a.status, a.date, a.time_in, a.time_out, e.employee_code,e.firstname, e.lastname from attendance a INNER JOIN employees as e on  e.employee_id=a.employee_id WHERE a.attendance_id = '$attendance_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
        $conn->close();
	}



	if(isset($_POST['deptRow'])){
        include 'includes/conn.php';
		$department_id = $_POST['id'];
		$sql = "SELECT department_id, department_name, created_on, updated_on FROM department WHERE department_id = '$department_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
        $conn->close();
	}



	if(isset($_POST['cashRow'])){
		include 'includes/conn.php';
		$cashadvance_id = $_POST['id'];
		$sql = "SELECT c.cashadvance_id, c.date_advance, c.amount, e.firstname, e.lastname FROM cashadvance c INNER JOIN employees as e on c.employee_id = e.employee_id WHERE cashadvance_id = '$cashadvance_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
		$conn->close();
	}



	if(isset($_POST['empschedRow'])){
		include 'includes/conn.php';
		$schedule_id = $_POST['id'];
		$sql = "SELECT s.schedule_id, s.time_in, s.time_out, e.employee_code, e.firstname, e.lastname FROM schedules s INNER JOIN employees as e on s.schedule_id=e.schedule_id WHERE s.schedule_id = '$schedule_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
		$conn->close();
	}

	

	if(isset($_POST['cashRow'])){
		include 'includes/conn.php';
		$cashadvance_id = $_POST['id'];
		$sql = "SELECT c.cashadvance_id, c.date_advance, c.amount, e.employee_id, e.firstname, e.lastname FROM cashadvance c INNER JOIN employees as e on c.employee_id = e.employee_id WHERE cashadvance_id = '$cashadvance_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
		$conn->close();
	}
?>