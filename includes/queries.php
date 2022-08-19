<?php 
function employeeTable(){
  include 'conn.php';
  $sql = "SELECT e.employee_id, e.photo, e.employee_code, e.firstname, e.lastname, e.address, e.birthdate, e.contact_info, e.gender, e.delete_flag, d.department_name, j.description, s.time_in, s.time_out FROM employees e INNER JOIN department as d on e.department_id=d.department_id INNER JOIN job as j on e.job_id=j.job_id INNER JOIN schedules as s on e.schedule_id=s.schedule_id WHERE e.delete_flag = false;";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
  <tr>
      <td><?php echo $row['photo']; ?></td>
      <td><?php echo $row['employee_code']; ?></td>
      <td><?php echo $row['firstname']?></td>
      <td><?php echo $row['lastname']; ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['birthdate'] ?></td>
      <td><?php echo $row['description'] ?></td>
      <td><?php echo date('h:i A', strtotime($row['time_in'])).' - '.date('h:i A', strtotime($row['time_out'])); ?></td>
      <td>
          <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['employee_id']; ?>"><i
                  class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['employee_id']; ?>"><i
                  class="fa fa-trash"></i> Delete</button>
      </td>
  </tr>
<?php
  }
}

function employeePosition(){
  include 'conn.php';
  $sql = "SELECT job_id, description FROM job";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['job_id']."'>".$prow['description']."</option>
      ";
  }
}

function employeeDepartment(){
  include 'conn.php';
  $sql = "SELECT department_id, department_name FROM department";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['department_id']."'>".$prow['department_name']."</option>
      ";
  }
}

function employeeAdd(){
  include 'conn.php';
	if(isset($_POST['add'])){
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$addressInfo = $_POST['address'];
		$birthDate = $_POST['birthdate'];
		$contactInfo = $_POST['contact'];
		$genderSelection = $_POST['gender'];
		$jobSelection = $_POST['job'];
		$departmentSelection= $_POST['department'];
		$scheduleSelection = $_POST['schedule'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], './images/'.$filename);	
		}
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		$sql = "INSERT INTO employees (employee_code, firstname, lastname, address, birthdate, contact_info, gender, job_id, department_id, schedule_id, photo, created_on) VALUES ('$employee_code','$firstName', '$lastName', '$addressInfo', '$birthDate', '$contactInfo', '$genderSelection', '$jobSelection', '$departmentSelection', '$scheduleSelection', '$filename', NOW() )";
		if($conn->query($sql)){
			echo "success";
		}
		else{
			echo "error";
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: employee_list.php');
}




















function attendanceTable(){
  include 'conn.php';
  $sql = "SELECT a.attendance_id, a.status, a.date, a.time_in, a.time_out, e.employee_code,e.firstname, e.lastname from attendance a INNER JOIN employees as e on  e.employee_id=a.employee_id ORDER BY date desc;";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
  $status = ($row['status'])?'<span class="badge text-bg-success pull-right">ontime</span>':'<span class="badge text-bg-danger pull-right">late</span>';
    ?>
  <tr>
      <td><?php echo date('M d, Y', strtotime($row['date'])); ?></td>
      <td><?php echo $row['employee_code']; ?></td>
      <td><?php echo $row['firstname']. ' ' .$row['lastname'];?></td>
      <td><?php echo date('h:i A', strtotime($row['time_in'])).' '.$status?></td>
      <td><?php echo date('h:i A', strtotime($row['time_out'])) ?></td>

      <td>
          <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['attendance_id']; ?>"><i
                  class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['attendance_id']; ?>"><i
                  class="fa fa-trash"></i> Delete</button>
      </td>
  </tr>
<?php
  }
}

function employeeAttendance(){
  include 'conn.php';
  $sql = "SELECT employee_id, firstname, lastname FROM employees";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['employee_id']."'>".$prow['firstname'].' ' .$prow['lastname']."</option>
      ";
  }
}
 
?>

