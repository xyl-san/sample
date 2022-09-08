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
		$sql = "SELECT schedule_id, time_in, time_out FROM schedules WHERE schedule_id = '$schedule_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
		$conn->close();
	}

	if(isset($_POST['getJobs'])){
		include 'includes/conn.php';
		$depart_id = $_POST['depart_id'];
		$users_arr = array();
		$sql = "SELECT job_id, job_name FROM job WHERE department_id = '$depart_id' AND delete_flag = '0'";

		$result = mysqli_query($conn,$sql);
		while( $row = mysqli_fetch_array($result) ){
			$userid = $row['job_id'];
			$name = $row['job_name'];
	  
			$users_arr[] = array("id" => $userid, "name" => $name);
		 }
		 // encoding array to json format
		echo json_encode($users_arr);
		$conn->close();
	}

	if(isset($_POST['jobRow'])){
		include 'includes/conn.php';
		$job_id = $_POST['id'];
		$sql = "SELECT j.job_id, j.job_name, d.department_name, d.department_id, j.description, j.rate FROM job AS j INNER JOIN department as d ON j.department_id = d.department_id WHERE j.job_id = '$job_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
		$conn->close();
	}

	if(isset($_POST['deductRow'])){
		include 'includes/conn.php';
		$deduction_id = $_POST['id'];
		$sql = "SELECT d.deduction_id, d.description, d.amount, e.employee_id, e.firstname, e.lastname FROM deductions d INNER JOIN employees AS e on d.employee_id = e.employee_id WHERE deduction_id = '$deduction_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>