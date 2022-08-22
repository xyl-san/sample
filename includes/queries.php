<?php 
function employeeTable(){
  include 'conn.php';
  $sql = "SELECT e.employee_id, e.photo, e.employee_code, e.firstname, e.lastname, e.address, e.birthdate, e.contact_info, e.gender, e.photo, e.delete_flag, d.department_name, j.description, s.time_in, s.time_out FROM employees e INNER JOIN department as d on e.department_id=d.department_id INNER JOIN job as j on e.job_id=j.job_id INNER JOIN schedules as s on e.schedule_id=s.schedule_id WHERE e.delete_flag = false;";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
  <tr>
      <td><img src="<?php echo (!empty($row['photo']))? './images/'.$row['photo']:'./images/profile.jpg'; ?>" width="30px"
              height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo"
              data-id="<?php echo $row['employee_id']; ?>"><span class="fa fa-edit"></span></a></td>
      <td><?php echo $row['employee_code']; ?></td>
      <td><?php echo $row['firstname'] . ' ' .$row['lastname'];?></td>
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

function employeeSchedule(){
  include 'conn.php';
  $sql = "SELECT schedule_id, time_in, time_out FROM schedules";
  $query = $conn->query($sql);
  while($srow = $query->fetch_assoc()){
      echo "
      <option value='".$srow['schedule_id']."'>".$srow['time_in']. ' ' .$srow['time_out']."</option>
      ";
  }
}


  if (isset($_POST['addEmployee'])) {
    employeeAdd();
  }
  function employeeAdd(){
    include 'conn.php';
    if(isset($_POST['addEmployee'])){
      $firstName = $_POST['firstname'];
      $lastName = $_POST['lastname'];
      $addressInfo = $_POST['address'];
      $birthDate = $_POST['birthdate'];
      $contactInfo = $_POST['contact'];
      $genderSelection = $_POST['gender'];
      $jobSelection = $_POST['job'];
      $departmentSelection= $_POST['department'];
      $scheduleSelection = $_POST['schedule'];
      $filename = $_FILES["photo"]["name"];
    	$tempname = $_FILES["photo"]["tmp_name"];
    	$folder = "./images/" . $filename;
      if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
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

    header('location: ../employees_list.php');
  }


  if (isset($_POST['editEmployee'])) {
    employeeEdit();
  }
    function employeeEdit(){
      include 'conn.php';
      if(isset($_POST['editEmployee'])){
        $employee_id = $_POST['employee_id'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $addressInfo = $_POST['address'];
        $birthDate = $_POST['birthdate'];
        $contactInfo = $_POST['contact_info'];
        $genderSelection = $_POST['gender'];
        $jobSelection = $_POST['job'];
        $departmentSelection= $_POST['department'];
        $scheduleSelection = $_POST['schedule'];
       
        $sql = "UPDATE employees SET firstname = '$firstName', lastname = '$lastName', address = '$addressInfo', birthdate = '$birthDate', contact_info = '$contactInfo', gender = '$genderSelection', job_id = '$jobSelection', department_id = '$departmentSelection', schedule_id = '$scheduleSelection' WHERE employee_id = '$employee_id'";
        if($conn->query($sql)){
          echo "success";
        }
        else{
          echo "error";
        }
      }
      header('location: ../employees_list.php');
    }

  if(isset($_POST['deleteEmployee'])){
    employeeDelete();
  }
  function employeeDelete(){
    include 'conn.php';
    if(isset($_POST['deleteEmployee'])){
      $employee_id = $_POST['employee_id'];
      $sql = "DELETE FROM employees WHERE employee_id = '$employee_id'";
    }
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee deleted successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
    header('location: ../employees_list.php');
  }


  if (isset($_POST['editEmployeePhoto'])) {
      employeeEditPhoto();
    }
    function employeeEditPhoto(){
	    include 'conn.php';
	    if(isset($_POST['editEmployeePhoto'])){
	    	$employee_id = $_POST['employee_id'];
        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "./images/" . $filename;
	    	if(!empty($filename)){
	    		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
	    	}
      
	    	$sql = "UPDATE employees SET photo = '$filename' WHERE employee_id = '$employee_id'";
	    	if($conn->query($sql)){
	    		$_SESSION['success'] = 'Employee photo updated successfully';
	    	}
	    	else{
	    		$_SESSION['error'] = $conn->error;
	    	}
      
      }
    else{
      $_SESSION['error'] = 'Select employee to update photo first';
    }
        header('location: ../employees_list.php');
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


<?php 
function departmentTable(){
  include 'conn.php';
  $sql = "SELECT department_id, department_name, created_on, updated_on FROM department";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['department_id']; ?></td>
    <td><?php echo $row['department_name']?></td>
    <td><?php echo $row['created_on']; ?></td>
    <td><?php echo $row['updated_on'] ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['department_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['department_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}


function jobTable(){
  include 'conn.php';
  $sql = "SELECT job_id, description, rate, created_on, updated_on FROM job";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['job_id']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['rate']; ?></td>
    <td><?php echo $row['created_on']; ?></td>
    <td><?php echo $row['updated_on']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['job_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['job_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}


// Accounting queries

function accountSelection(){
  include 'conn.php';
  $sql = "SELECT account_id, description FROM account_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['account_id']."'>".$prow['description'];"</option>
      ";
  }
}

function accountGroupSelection(){
  include 'conn.php';
  $sql = "SELECT accountgroup_id , name FROM group_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['accountgroup_id']."'>".$prow['name'];"</option>
      ";
  }
}


?>