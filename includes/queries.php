<?php 
function employeeTable(){
  include 'conn.php';
  $sql = "SELECT e.employee_id, e.photo, e.employee_code, e.firstname, e.lastname, e.address, e.birthdate, e.contact_info, e.gender, e.photo, e.delete_flag, d.department_name, j.job_name, s.time_in, s.time_out FROM employees e INNER JOIN department as d on d.department_id = e.department_id INNER JOIN job as j on j.job_id = e.job_id INNER JOIN schedules as s on e.schedule_id=s.schedule_id WHERE e.delete_flag = false;";
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
    <td><?php echo $row['job_name'] ?></td>
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
  $conn->close(); 
}

function employeePosition(){
  include 'conn.php';
  $sql = "SELECT job_id, job_name FROM job";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['job_id']."'>".$prow['job_name']."</option>
      ";
  }
  $conn->close();
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
  $conn->close();
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
  $conn->close();
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
    $conn->close();
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
       
        $sql = "UPDATE employees SET firstname = '$firstName', lastname = '$lastName', address = '$addressInfo', birthdate = '$birthDate', contact_info = '$contactInfo', gender = '$genderSelection', department_id = '$departmentSelection', job_id = '$jobSelection', schedule_id = '$scheduleSelection' WHERE employee_id = '$employee_id'";
        if($conn->query($sql)){
          echo "success";
        }
        else{
          echo "error";
        }
      }
      $conn->close();
      header('location: ../employees_list.php');
    }

  if(isset($_POST['deleteEmployee'])){
    employeeDelete();
  }
  function employeeDelete(){
    include 'conn.php';
    if(isset($_POST['deleteEmployee'])){
      $employee_id = $_POST['employee_id'];
      $sql = "UPDATE employees SET delete_flag = 1 WHERE employee_id = '$employee_id'";
    }
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee deleted successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
    $conn->close();
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
    $conn->close();
    header('location: ../employees_list.php');
  }

// Attendance
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
    </td>
</tr>
<?php
  }
  $conn->close();
}

function employeeSelection(){
  include 'conn.php';
  $sql = "SELECT employee_id, firstname, lastname FROM employees";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['employee_id']."'>".$prow['firstname'].' ' .$prow['lastname']."</option>
      ";
  }
  $conn->close();
}

if (isset($_POST['addAttendance'])) {
  attendanceAdd();
}
function attendanceAdd(){
  include 'conn.php';
  if(isset($_POST['addAttendance'])){
    $employee_id = $_POST['employeeId'];
    $date = $_POST['date'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    $sql = "INSERT INTO attendance (employee_id, date, time_in, time_out, created_on) VALUES ('$employee_id','$date', '$time_in', '$time_out', NOW() )";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: attendance_list.php');
}

if (isset($_POST['editAttendance'])) {
  attendanceEdit();
}

function attendanceEdit(){
  include 'conn.php';
  if(isset($_POST['editAttendance'])){
    $attendance_id = $_POST['attendance_id'];
    $date = $_POST['date'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    $sql = "UPDATE attendance SET date = '$date', time_in = '$time_in', time_out = '$time_out', updated_on = NOW() WHERE attendance_id = '$attendance_id'";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: attendance_list.php');
}

// Attendance 

// Schedules

function scheduleTable(){
  include 'conn.php';
  $sql = "SELECT schedule_id, time_in, time_out FROM schedules WHERE delete_flag = '0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      ?>
<tr>
    <td><?php echo $row['time_in']; ?></td>
    <td><?php echo $row['time_out'];?></td>
    <td>
        <button class="btn btn-success btn-sm schedEdit btn-flat" data-id="<?php echo $row['schedule_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm schedDelete btn-flat" data-id="<?php echo $row['schedule_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}

if (isset($_POST['schedAdd'])){
  scheduleAdd();
}

function scheduleAdd(){
  if(isset($_POST['schedAdd'])){
    include 'conn.php';
    $time_in = $_POST['timein'];
    $time_out = $_POST['timeout'];

    $sql = "INSERT INTO schedules (time_in, time_out, created_on) VALUES ('$time_in', '$time_out', NOW())";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: employees_list.php');
}

if (isset($_POST['schedEdit'])){
  scheduleEdit();
}

function scheduleEdit(){
  if(isset($_POST['schedEdit'])){
    include 'conn.php';
    $schedule_id = $_POST['scheduleid'];
    $time_in = $_POST['timein'];
    $time_out = $_POST['timeout'];

    $sql = "UPDATE schedules SET time_in = '$time_in', time_out = '$time_out', updated_on = NOW() WHERE schedule_id = '$schedule_id'";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: employees_list.php');
}

if(isset($_POST['schedDelete'])){
  include 'conn.php';
  $schedule_id = $_POST['scheduleid'];

  $sql = "UPDATE schedules SET delete_flag = 1 WHERE schedule_id = '$schedule_id'";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
  $conn->close();
  header('location: employees_list.php');
}

// Schedules


?>


<?php 
// Department

function departmentTable(){
  include 'conn.php';
  $sql = "SELECT department_id, department_name, created_on, updated_on FROM department WHERE delete_flag = '0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $d_id = $row['department_id'];
    ?>
<tr>
    <td><?php echo $row['department_id']; ?></td>
    <td><?php echo $row['department_name']?></td>
    <td>
        <table class="table table-bordered"><?php departmentJobs($d_id); ?></table>
    </td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['department_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['department_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}

function departmentJobs($d_id){
  $dept_id = $d_id;
  include 'conn.php';
  $sql = "SELECT department_id, job_name FROM job WHERE department_id = $dept_id";
  $query = $conn->query($sql);
  if(mysqli_num_rows($query) != 0){
    while($row = $query->fetch_assoc()){
      ?>
<tr>
    <td><?php echo $row['job_name']; ?></td>
</tr>
<?php
    }
  }else{
    echo "<p>There are no jobs in this department yet. Try adding a job!</p>";
  }
  
  $conn->close();
}




if(isset($_POST['departmentAdd'])){
  departmentAdd();
}

function departmentAdd(){
  include 'conn.php';
  if(isset($_POST['departmentAdd'])){
    $department_name = $_POST['departmentname'];

    $sql = "INSERT INTO department (department_name, created_on) VALUES ('$department_name', NOW())";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: department_list.php');
}

if(isset($_POST['departmentEdit'])){
  departmentEdit();
}

function departmentEdit(){
  include 'conn.php';
  if(isset($_POST['departmentEdit'])){
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];

    $sql = "UPDATE department SET department_name = '$department_name', updated_on = NOW() WHERE department_id = '$department_id'";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: department_list.php');
}

if(isset($_POST['departmentDelete'])){
  departmentDelete();
}

function departmentDelete(){
  include 'conn.php';
  if(isset($_POST['departmentDelete'])){
    $department_id = $_POST['department_id'];

    $sql = "UPDATE department SET delete_flag = '1', updated_on = NOW() WHERE department_id = '$department_id'";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: department_list.php');
}


// Department

// Job
function jobTable(){
  include 'conn.php';
  $sql = "SELECT j.job_id, j.job_name, j.description, j.rate, d.department_id, d.department_name FROM job AS j INNER JOIN department AS d ON j.department_id = d.department_id WHERE j.delete_flag = '0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $j_id = $row['job_id'];
    ?>
<tr>
    <td><?php echo $row['job_id']; ?></td>
    <td><?php echo $row['department_name']; ?></td>
    <td><?php echo $row['job_name']; ?></td>
    <td>
        <table class="table table-bordered"><?php employeeJobs($j_id); ?></table>
    </td>
    <td><?php echo $row['rate']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['job_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['job_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}

if(isset($_POST['jobAdd'])){
  jobAdd();
}

function jobAdd(){
  include 'conn.php';
  if(isset($_POST['jobAdd'])){
    $dept_id = $_POST['departmentId'];
    $job_name = $_POST['jobname'];
    $job_desc = $_POST['jobdesc'];
    $rate = $_POST['rate'];

    $sql = "INSERT INTO job (department_id, job_name, description, rate, created_on) VALUES ('$dept_id', '$job_name', '$job_desc', '$rate', NOW())";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: job_list.php');
}

function employeeJobs($j_id){
  $job_id = $j_id;
  include 'conn.php';
  $sql = "SELECT `job_id`, `firstname`, `lastname` FROM `employees` WHERE job_id = '$job_id'";
  $query = $conn->query($sql);
  if(mysqli_num_rows($query) != 0){
    while($row = $query->fetch_assoc()){
      ?>
<tr>
    <td><?php echo $row['firstname'] . ' ' .$row['lastname']; ?></td>
</tr>
<?php
    }
  }else{
    echo "<p>There are no employees in this job yet. Try adding someone!</p>";
  }
  
  $conn->close();
}

if(isset($_POST['jobEdit'])){
  include 'conn.php';
  $job_id = $_POST['jobid'];
  $dept_id = $_POST['departmentId'];
  $job_name = $_POST['jobname'];
  $job_desc = $_POST['jobdesc'];
  $rate = $_POST['rateInfo'];
  
  $sql = "UPDATE job SET department_id = '$dept_id', job_name = '$job_name', description = '$job_desc', rate = '$rate' WHERE job_id = '$job_id'";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
$conn->close();
header('location: job_list.php');
}

if(isset($_POST['jobDelete'])){
  include 'conn.php';
  $job_id = $_POST['jobid'];

  $sql = "UPDATE job SET delete_flag = '1' WHERE job_id = '$job_id'";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
$conn->close();
header('location: job_list.php');
}
// Job

// Deduction
function deductionTable(){
  include 'conn.php';
  $sql = "SELECT d.deduction_id, d.description, d.amount, e.firstname, e.lastname FROM deductions as d INNER JOIN employees as e ON d.employee_id = e.employee_id WHERE d.delete_flag = 0";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['firstname'] ." ". $row['lastname']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['deduction_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['deduction_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}

if(isset($_POST['deductAdd'])){
  include 'conn.php';
  $employee_id = $_POST['employeeId'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  
  $sql = "INSERT INTO deductions (description, amount, employee_id, created_on) VALUES ('$description', '$amount', '$employee_id', NOW())";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
$conn->close();
header('location: deduction_list.php');
}

if(isset($_POST['deductEdit'])){
  include 'conn.php';
  $deduction_id = $_POST['deductionid'];
  $employee_id = $_POST['employeeId'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];

  $sql = "UPDATE deductions SET description = '$description', amount = '$amount', employee_id = '$employee_id', updated_on = NOW() WHERE deduction_id = '$deduction_id'";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
  $conn->close();
  header('location: deduction_list.php');
}

if(isset($_POST['deductDelete'])){
  include 'conn.php';
  $deduction_id = $_POST['deductionid'];
  $sql = "UPDATE deductions SET delete_flag = '1' WHERE deduction_id = '$deduction_id'";
  if($conn->query($sql)){
    echo "success";
  }
  else{
    echo "error";
  }
  $conn->close();
  header('location: deduction_list.php');
}




// Deduction

// Cash Advance

function cashadvanceTable(){
  include 'conn.php';
  $sql = "SELECT ca.cashadvance_id, ca.date_advance, ca.employee_id, ca.amount, e.firstname, e.lastname FROM cashadvance AS ca INNER JOIN employees AS e ON ca.employee_id = e.employee_id WHERE ca.delete_flag = '0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['firstname'] ." ". $row['lastname']; ?></td>
    <td><?php echo $row['date_advance']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['cashadvance_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['cashadvance_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}

if (isset($_POST['advanceAdd'])) {
  cashAdvanceAdd();
}

function cashAdvanceAdd(){
  include 'conn.php';
  if(isset($_POST['advanceAdd'])){
    $employeeID = $_POST['employeeId'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO cashadvance (date_advance, employee_id, amount, created_on) VALUES ('$date', '$employeeID', '$amount', NOW())";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: cashadvance_list.php');
}

if (isset($_POST['advanceEdit'])) {
  cashAdvanceEdit();
}
function cashAdvanceEdit(){
  include "conn.php";
  if (isset($_POST['advanceEdit'])){
    $cash_id = $_POST['cashadvanceid'];
    $employee_id = $_POST['employeeId'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $sql = "UPDATE cashadvance SET date_advance = '$date', employee_id = '$employee_id', amount = '$amount', updated_on = NOW()";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: cashadvance_list.php');
}

if (isset($_POST['advanceDelete'])) {
  cashAdvanceDelete();
}

function cashAdvanceDelete(){
  include "conn.php";
  if (isset($_POST['advanceDelete'])){
    $cash_id = $_POST['cashadvanceid'];

    $sql = "UPDATE cashadvance SET delete_flag = 1 WHERE cashadvance_id = '$cash_id'";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: cashadvance_list.php');
}


// Cash Advance


// Accounting queries
// journal entries table queries

function addToList(){
  include 'conn.php';
  $sql = "INSERT INTO employees (employee_code, firstname, lastname, address, birthdate, contact_info, gender, job_id, department_id, schedule_id, photo, created_on) VALUES ('$employee_code','$firstName', '$lastName', '$addressInfo', '$birthDate', '$contactInfo', '$genderSelection', '$jobSelection', '$departmentSelection', '$scheduleSelection', '$filename', NOW() )";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['accountgroup_id']."'>".$prow['name'];"</option>
      ";
  }
  $conn->close();
}

// Journal Entries Table queries
function journalEntryTable(){
  include 'conn.php';
  $sql = "SELECT journEntry.journal_entries_id, journEntry.journal_id, journEntry.date, journEntry.journal_entries_code, journEntry.partner, journEntry.reference, journEntry.total, journEntry.type, journEntry.status, journ.journal_id, journ.journal_name FROM journal_entries as journEntry INNER JOIN journal as journ ON journEntry.journal_id = journ.journal_id WHERE delete_flag = 0";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
    $type = ($row['type'])?'<span class="badge text-bg-warning pull-right">Credit</span>':'<span class="badge text-bg-info pull-right">Debit</span>';
    ?>
<tr>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['journal_entries_code']; ?></td>
    <td><?php echo $row['partner']; ?></td>
    <td><?php echo $row['reference']; ?></td>
    <td><?php echo $row['journal_name']; ?></td>
    <td><?php echo $row['total']; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $status; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['journal_entries_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['journal_entries_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}
// Journal Entries Table queries end

// journal entry add queries
if (isset($_POST['addJournalEntry'])) {
  journalEntryAdd();
}
function journalEntryAdd(){
  include 'conn.php';
  if(isset($_POST['addJournalEntry'])){
    $journalEntryDate = $_POST['journal_date'];
    $journalDescription = $_POST['description'];
    $accounListSelection = $_POST['accountList'];
    $groupListSelection = $_POST['groupList'];
    $amount = $_POST['amount'];
    $letters = '';
      $numbers = '';
      foreach (range('A', 'Z') as $char) {
          $letters .= $char;
      }
      for($i = 0; $i < 10; $i++){
        $numbers .= $i;
      }
      $code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
    $sql = "INSERT INTO journal_entries (code,journal_date, description, date_created) VALUES ('$code','$journalEntryDate','$journalDescription', NOW() )";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location:../journal_entry.php');
}
// journal entry add queries end

// working trial balance table queries
function workingTrialBalanceTable(){
  include 'conn.php';
  $sql = "SELECT journal_date, code, description, amount FROM journal_entries, journal_items WHERE journal_entries.journal_id= journal_items.journal_id";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['journal_date']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['code']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>
<?php
  }
  $conn->close();
}
// working trial balance table queries end

// trial balance table queries
function trialBalanceTable(){
  include 'conn.php';
  $sql = "SELECT journal_date, code, account_id, group_id, description, amount FROM journal_entries, journal_items WHERE journal_entries.journal_id= journal_items.journal_id";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['journal_date']; ?></td>
    <td><?php echo $row['code']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>
<?php
  }
  $conn->close();
}
// trial balance table queries end

// account list selection in journal queries
function accountListSelection(){
  include 'conn.php';
  $sql = "SELECT account_id, account_name FROM account_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['account_id']."'>".$prow['account_name']."</option>
      ";
  }
  $conn->close();
}
// account list selection in journal end

// account list selection in journal queries
function groupListSelection(){
  include 'conn.php';
  $sql = "SELECT group_id, group_name FROM group_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['group_id']."'>".$prow['group_name']."</option>
      ";
  }
  $conn->close();
}
// account list selection in journal queries end

// account list add new queries
if (isset($_POST['addAccountList'])) {
  accountListAdd();
}
function accountListAdd(){
  include 'conn.php';
  if(isset($_POST['addAccountList'])){
    $accountName = $_POST['accountName'];
    $accountDescription = $_POST['accountDescription'];
    $accountStatus = $_POST['accountStatus'];
   
    $sql = "INSERT INTO account_list (account_name, description, status, date_created) VALUES ('$accountName','$accountDescription','$accountStatus', NOW() )";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location:../account_list.php');
}
// account list add new queries end


 

  // group list table queries
  function groupListTable(){
    include 'conn.php';
    $sql = "SELECT group_id, group_name, description, type, status, date_created FROM group_list";
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
      $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
      $type = ($row['type'])?'<span class="badge text-bg-warning pull-right">Credit</span>':'<span class="badge text-bg-info pull-right">Debit</span>';
      ?>
<tr>
    <td><?php echo $row['group_id']; ?></td>
    <td><?php echo $row['date_created']; ?></td>
    <td><?php echo $row['group_name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $status; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['group_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['group_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
    }
  }
 // group list table queries end

// group list add new queries
  if (isset($_POST['addGroupList'])) {
    addGroupList();
  }
  function addGroupList(){
    include 'conn.php';
    if(isset($_POST['addGroupList'])){
      $name = $_POST['name'];
      $description = $_POST['description'];
      $type = $_POST['type'];
      $status = $_POST['status'];
      $sql = "INSERT INTO group_list (group_name, description,type, status, date_created) VALUES ('$name','$description','$type','$status', NOW() )";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location:../group_list.php');
  }
// group list add new queries end

// group list edit queries
  if (isset($_POST['editGroupList'])) {
    groupListEdit();
    }
      function groupListEdit(){
        include 'conn.php';
        if(isset($_POST['editGroupList'])){
          $groupId = $_POST['group_id'];
          $groupName = $_POST['name'];
          $groupDescription = $_POST['description'];
          $groupTypeSelection = $_POST['type'];
          $groupStatusSelection = $_POST['status'];
          $sql = "UPDATE group_list SET group_name = '$groupName', description = '$groupDescription',type='$groupTypeSelection', status = '$groupStatusSelection' WHERE group_id = '$groupId'";
          if($conn->query($sql)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        $conn->close();
        header('location:../group_list.php');
      }
// group list edit queries  end

// group list delelte queries
      if (isset($_POST['deleteGroupList'])) {
        groupListDelete();
      }
      function groupListDelete(){
        include 'conn.php';
        if(isset($_POST['deleteGroupList'])){
          $groupId = $_POST['group_id'];
          $sql = "DELETE FROM group_list WHERE group_id = '$groupId'";
        }
        if($conn->query($sql)){
          $_SESSION['success'] = 'Group list deleted successfully';
        }
        else{
          $_SESSION['error'] = $conn->error;
        }
        $conn->close();
        header('location:../group_list.php');
      }
// group list delelte queries end

      if (isset($_POST['leadAdd'])) {
        leadAdd();
      }
      function leadAdd(){
        include 'conn.php';
        if(isset($_POST['leadAdd'])){
          $name = $_POST['leadname'];
          $email = $_POST['leademail'];
          $contact_number = $_POST['leadcontact'];
          $description = $_POST['leaddescription'];

          $sql = "INSERT INTO leads (name, email, contact_number, description) VALUES('$name', '$email', '$contact_number', '$description')";
          if($conn->query($sql)){
            echo 'success';
          }
          else{
            echo "error";
          }
        }
        $conn->close();
        header('location: ../crm.php');
      }

  //CRM Change Stage
  if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 1 : prospect(); break;
        case 2 : access(); break;
        case 3 : proposition(); break;
        case 4 : award(); break;
        case 5 : delivered(); break;
    }
}

  function prospect(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '1' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function access(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '2' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function proposition(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '3' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function award(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '4' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function delivered(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '5' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }

   //CRM Change Stage
  if(isset($_POST['delete'])){
    deleteLead();
  }
   //Lead Delete
  function deleteLead(){
    require_once('conn.php');
    $lead_id = intval($_POST['lead_id']);
    $sql = "UPDATE leads SET delete_flag = '1' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();

    echo json_encode(array('success'=>1));
  }
   //Lead Delete




   // Inventory
function inventoryTable(){
  include 'conn.php';
  $sql = "SELECT inventory_id, photo, product_id, description, quantity, updated_on FROM inventory ORDER BY description ASC;";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      ?>
<tr>
    <td><img src="<?php echo (!empty($row['photo']))? './images/'.$row['photo']:'./images/profile.jpg'; ?>" width="30px"
            height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo"
            data-id="<?php echo $row['inventory_id']; ?>"><span class="fa fa-edit"></span></a></td>
    <td><?php echo $row['product_id']; ?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['quantity'];?></td>
    <td><?php echo date('h:i A', strtotime($row['updated_on'])) ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['inventory_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['inventory_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close();
}


// accounting invoices queries
function customerTable(){
  include 'conn.php';
  $sql = "SELECT c.customer_id,  c.customer_firstname,  c.customer_lastname,  c.customer_contact_info,  c.customer_address,  c.created_on,  c.updated_on, e.firstname, e.lastname FROM customer c INNER JOIN employees AS e ON c.employee_id = e.employee_id WHERE c.delete_flag='0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td></td>
    <td><?php echo $row['customer_id']; ?></td>
    <td><?php echo $row['created_on']; ?></td>
    <td><?php echo $row['customer_firstname'].", ". $row['customer_lastname']; ?></td>
    <td><?php echo $row['customer_contact_info']; ?></td>
    <td><?php echo $row['customer_address']; ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $row['firstname'].", ". $row['lastname'];; ?></td>
</tr>
<?php
  }
}


function customerInvoice(){
  include 'conn.php';
  $sql = "SELECT customer_id, customer_firstname,customer_lastname FROM customer";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['customer_id']."'>".$prow['customer_firstname'].", ".$prow['customer_lastname']."</option>
      ";
  }
  $conn->close();
}

if (isset($_POST['addCustomerInvoice'])) {
  customerInvoiceAdd();
}
function customerInvoiceAdd(){
  include 'conn.php';
  if(isset($_POST['addCustomerInvoice'])){
    $product = $_POST['product'];
    $label = $_POST['label'];
    $account = $_POST['account'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $taxes = $_POST['taxes'];
    $subtotal = $_POST['subtotal'];
    $total_amount = $_POST['total_amount'];
    $invoiceDate = $_POST['invoiceDate'];
    $invoiceCode = $_POST['invoiceCode'];
    $customer = $_POST['customer'];
    $currency = $_POST['currency'];
    $dueDate = $_POST['dueDate'];
    $terms = $_POST['terms'];
    $paymentReference = $_POST['paymentReference'];
    $salesPerson = $_POST['salesPerson'];
    $invoiceNotes = $_POST['invoiceNotes'];

    $sql= "INSERT INTO `invoice` (`invoice_code`, `product_id`, `label`, `account_id`, `quantity`, `price`, `taxes`, `subtotal`, `amount_total`, `customer_id`, `currency`, `invoice_date`, `due_date`, `terms`, `payment_reference`, `employee_id`, `invoice_notes`) VALUES ('$invoiceCode', '$product', '$label', '$account', '$quantity', '$price', '$taxes', '$subtotal', '$total_amount', '$customer', '$currency', '$invoiceDate', '$dueDate', '$terms', '$paymentReference', ' $salesPerson', '$invoiceNotes')";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
  $conn->close();
  header('location: ../create_invoice.php');
}

function invoicesTable(){
  include 'conn.php';
  $sql = "SELECT inv.invoice_id AS invoice_id, inv.invoice_code, inv.product_id, inv.label, inv.account_id, inv.quantity, inv.price, inv.taxes, inv.subtotal, inv.amount_total,inv.currency, inv.invoice_date, inv.due_date, inv.terms, inv.payment_reference, inv.employee_id, inv.delete_flag, emp.firstname, emp.lastname, prod.product_name, prod.product_description, cust.customer_id, cust.customer_firstname, cust.customer_lastname FROM invoice inv INNER JOIN employees AS emp ON inv.employee_id=emp.employee_id INNER JOIN product AS prod ON inv.product_id = prod.product_id INNER JOIN customer AS cust ON inv.customer_id = cust.customer_id WHERE inv.delete_flag=0";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['invoice_code']; ?></td>
    <td><?php echo $row['due_date']; ?></td>
    <td><?php echo $row['terms']; ?></td>
    <td><?php echo $row['customer_firstname'].", ". $row['customer_lastname']; ?></td>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['taxes']; ?></td>
    <td><?php echo $row['amount_total']; ?></td>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['payment_reference']; ?></td>
    <td> <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['invoice_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>

        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['invoice_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}

function productInvoice(){
  include 'conn.php';
  $sql = "SELECT product_id, product_name FROM product";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['product_id']."'>".$prow['product_name']."</option>
      ";
  }
  $conn->close();
}

function productDescriptionInvoice(){
  include 'conn.php';
  $sql = "SELECT product_id, product_description FROM product";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['product_id']."'>".$prow['product_description']."</option>
      ";
  }
  $conn->close();
}

function salesPerson(){
  include 'conn.php';
  $sql = "SELECT employee_id, firstname, lastname FROM employees";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['employee_id']."'>".$prow['firstname'].", ".$prow['lastname']."</option>
      ";
  }
  $conn->close();
}

function journalItemsTable(){
  include 'conn.php';
  $sql = "SELECT inv.invoice_code, inv.product_id, inv.label, inv.account_id, inv.quantity, inv.price, inv.taxes, inv.subtotal, inv.amount_total,inv.currency, inv.invoice_date,inv.due_date, inv.terms, inv.payment_reference, inv.employee_id, emp.firstname, emp.lastname, prod.product_name, prod.product_description, cust.customer_id, cust.customer_firstname, cust.customer_lastname, acc.account_id, acc.account_name, acc.description FROM invoice inv INNER JOIN employees AS emp ON inv.employee_id=emp.employee_id INNER JOIN product AS prod ON inv.product_id = prod.product_id INNER JOIN customer AS cust ON inv.customer_id = cust.customer_id INNER JOIN account_list AS acc on inv.account_id = acc.account_id WHERE inv.delete_flag='0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['account_name']; ?></td>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['due_date']; ?></td>
    <td><?php echo $row['terms']; ?></td>
    <td><?php echo $row['amount_total']; ?></td>
    <td><?php echo $row['taxes']; ?></td>
    <td></td>
    <td></td>
</tr>
<?php
  }
}

if(isset($_POST['deleteInvoice'])){
  invoiceDelete();
}
function invoiceDelete(){
  include 'conn.php';
  if(isset($_POST['deleteInvoice'])){
    $invoiceId = $_POST['invoiceId'];
    $sql = "UPDATE invoice SET delete_flag = 1 WHERE invoice_id = '$invoiceId'";
  }
  if($conn->query($sql)){
    $_SESSION['success'] = 'Customer invoice deleted successfully';
  }
  else{
    $_SESSION['error'] = $conn->error;
  }
  $conn->close();
  header('location: ../invoices.php');
}

if (isset($_POST['editInvoice'])) {
  invoiceEdit();
}
  function invoiceEdit(){
    include 'conn.php';
    if(isset($_POST['editInvoice'])){
      $invoiceId = $_POST['invoice_id'];
      $invoiceCode = $_POST['invoice_code'];
      $customerId = $_POST['customer_id'];
      $invoiceDate = $_POST['invoice_date'];
      $paymentReference = $_POST['payment_reference'];
      $dueDate = $_POST['due_date'];
      $terms = $_POST['terms'];
      $productId = $_POST['product'];
      $label = $_POST['label']; 
      $accountId = $_POST['account_id'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];
      $taxes = $_POST['taxes'];
      $subtotal = $_POST['subtotal'];
      $total_amount = $_POST['total_amount'];
      $currency = $_POST['currency'];
      $employeeId = $_POST['employee_id'];
      $invoiceNotes = $_POST['invoice_notes'];
  
      $sql = "UPDATE invoice SET `zinvoice_code`='$invoiceCode',`product_id`='$productId',`label`='$label',`account_id`='$accountId',`quantity`='$quantity',`price`='$price',`taxes`='$taxes',`subtotal`='$subtotal',`amount_total`='$total_amount',`customer_id`='$customer',`currency`='$currency',`invoice_date`='$invoiceDate',`due_date`='$dueDate',`terms`='$terms',`payment_reference`='$paymentReference',`employee_id`='$employeeId',`invoice_notes`='$invoiceNotes' WHERE `invoice_id` = '$invoiceId' ";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location: ../invoices.php');
  }

// end accounting invoices queries

// Accounting credit notes queries
function creditNotesTable(){
  include 'conn.php';
  $sql = "SELECT crd.credit_notes_id as credit_notes_id, crd.credit_notes_code, crd.invoice_date,crd.due_date, crd.label,crd.quantity, crd.price, crd.tax, crd.subtotal, crd.total_amount, crd.currency, crd.payment_status, prod.product_id, prod.product_name,prod.product_description, emp.employee_id, emp.firstname, emp.lastname, cust.customer_id, cust.customer_firstname, cust.customer_lastname FROM credit_notes crd INNER JOIN product AS prod ON crd.product_id = prod.product_id INNER JOIN employees AS emp ON crd.employee_id = emp.employee_id INNER JOIN customer AS cust ON crd.customer_id = cust.customer_id WHERE crd.delete_flag='0'";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['credit_notes_code']; ?></td>
    <td><?php echo $row['customer_firstname'].", ". $row['customer_lastname']; ?></td>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['due_date']; ?></td>
    <td><?php echo $row['firstname'].", ". $row['lastname']; ?></td>
    <td><?php echo $row['tax']; ?></td>
    <td><?php echo $row['total_amount']; ?></td>
    <td><?php echo $row['total_amount']; ?></td>
    <td><?php echo $row['currency']; ?></td>
    <td> <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['credit_notes_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['credit_notes_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}

if (isset($_POST['addCreditNotes'])) {
  creditNotesAdd();
}
function creditNotesAdd(){
  include 'conn.php';
  if(isset($_POST['addCreditNotes'])){
    $creditNotesCode = $_POST['credit_notes_code'];
    $customerId = $_POST['customer_id'];
    $invoiceDate = $_POST['invoice_date'];
    $paymentReference = $_POST['payment_reference'];
    $dueDate = $_POST['due_date'];
    $termsType = $_POST['terms'];
    $salesPerson = $_POST['employee_id'];
    $currencyType = $_POST['currency'];
    $productId = $_POST['product_id'];
    $label = $_POST['label'];
    $accountId = $_POST['account_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $tax = $_POST['tax'];
    $subtotal = $_POST['subtotal'];
    $total_amount = $_POST['total_amount'];
    $creditNotes = $_POST['notes'];
    
    $sql = "INSERT INTO `credit_notes` (`credit_notes_code`, `customer_id`, `invoice_date`, `due_date`, `terms`, `employee_id`, `product_id`, `label`, `account_id`, `quantity`, `price`, `tax`, `subtotal`, `total_amount`, `currency`, `payment_reference`, `notes`) VALUES
    ('$creditNotesCode', '$customerId', ' $invoiceDate', '$dueDate', '$termsType', '$salesPerson', '$productId', '$label', '$accountId', '$quantity', '$price', '$tax', '$subtotal', '$total_amount', '$currencyType', '$paymentReference', '$creditNotes')";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location: ../credit_notes.php');
  }
  
  if (isset($_POST['addJournalEntries'])) {
    journalEntriesAdd();
  }
  function journalEntriesAdd(){
    include 'conn.php';
    if(isset($_POST['addJournalEntries'])){
      $openingDate = $_POST['openingDate'];
      $fiscalYearEnd = $_POST['fiscalYearEnd'];
      $periodicity = $_POST['periodicity'];
      $reminder = $_POST['reminder'];
      $journal = $_POST['journal'];

      $letters = '';
      $numbers = '';
      foreach (range('A', 'Z') as $char) {
          $letters .= $char;
      }
      for($i = 0; $i < 10; $i++){
        $numbers .= $i;
      }
      $accounting_period_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
      $sql = "INSERT INTO `accounting_periods` ( `accounting_periods_code`, `opening_date`, `fiscal_year_end`, `periodicity`, `reminder`, `journal`) VALUES 
      ('$accounting_period_code', '$openingDate', '$fiscalYearEnd', '$periodicity', '$reminder', '$journal')";
        if($conn->query($sql)){
          echo "success";
        }
        else{
          echo "error";
        }
      }
      $conn->close();
      header('location: ../journal_entries.php');
    }
    
   // allowed account list in advance settings
   function allowedAccountType(){
    include 'conn.php';
    $sql = "SELECT account_name, type FROM account_type_list";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['account_name']."'>".$prow['account_name']."</option>
        ";
    }
    $conn->close();
  }


  // allowed account list in advance settings
  function allowedAccount(){
    include 'conn.php';
    $sql = "SELECT account_id, account_description FROM account_list";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['account_id']."'>".$prow['account_description']."</option>
        ";
    }
    $conn->close();
  }


// allowed account type list table
function accountListTypeTableInModal(){
  include 'conn.php';
  $sql = "SELECT account_name, type FROM account_type_list ";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    ?>
<tr>
    <td><?php echo $row['account_name']; ?></td>
    <td><?php echo $row['type']; ?></td>
</tr>
<?php
  }
}

// allowed account list table
function accountListTableInModal(){
  include 'conn.php';
  $sql = "SELECT acct.account_id, acct.account_code, acct.account_description, acct.default_taxes, acct.tags, acct.allow_reconciliation, acct.deprecated, acct.journal_id, acctype.account_name FROM account_type_list acctype INNER JOIN account_list AS acct ON acctype.account_name = acct.account_name";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $allowRelo = ($row['allow_reconciliation'])?'<span class="badge text-bg-success pull-right">YES</span>':'<span class="badge text-bg-danger pull-right">NO</span>';
    
    ?>
<tr>
    <td><?php echo $row['account_code']; ?></td>
    <td><?php echo $row['account_description']; ?></td>
    <td><?php echo $row['account_name']; ?></td>
    <td><?php echo $allowRelo; ?></td>
    <td></td>
    <td><?php echo $row['default_taxes']; ?></td>
    <td><?php echo $row['tags']; ?></td>
    <td><?php echo $row['journal_id']; ?></td>
</tr>
<?php
  }
}

// Add new journal Entry

if(isset($_POST['createJournalEntry'])){
  journalCreate();
}
  function journalCreate(){
  include 'conn.php';
  if(isset($_POST['createJournalEntry'])){
    $journal_entries_id = $_POST['journal_entries_id'];
    $date = $_POST['date'];
    $journal_entries_code = $_POST['journal_entries_code'];
    $partner = $_POST['partner'];
    $reference = $_POST['reference'];
    $journal_id = $_POST['journal'];
    $type = $_POST['type'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO `journal_entries` (`journal_entries_id`, `journal_id`, `date`, `journal_entries_code`, `partner`, `reference`, `total`, `status`, `type`) VALUES ('$journal_entries_id','$journal_id','$date','$journal_entries_code','$partner','$reference','$total','$status','$type')";
  
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
$conn->close();
header('location: ../journal_entry.php');
}
// EDIT Journal Entry
if (isset($_POST['editJournalEntry'])) {
  journalEntryEdit();
}
  function journalEntryEdit(){
    include 'conn.php';
    if(isset($_POST['editJournalEntry'])){
      $journal_entries_id = $_POST['journal_entries_id'];
      $date = $_POST['date'];
      $journal_entries_code = $_POST['journal_entries_code'];
      $partner = $_POST['partner'];
      $reference = $_POST['reference'];
      $journal_id = $_POST['journal'];
      $total = $_POST['total'];
      $type = $_POST['type'];
      $status = $_POST['status'];
     
      $sql = "UPDATE journal_entries SET date = '$date', journal_entries_code = '$journal_entries_code', partner = '$partner', reference = '$reference', journal_id = '$journal_id', total = '$total', type = '$type', status = '$status' WHERE journal_entries_id = '$journal_entries_id'";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location: ../journal_entry.php');
  }
// DELETE Journal Entry

if(isset($_POST['deleteJournalEntry'])){
  journalEntryDelete();
}
function journalEntryDelete(){
  include 'conn.php';
  if(isset($_POST['deleteJournalEntry'])){
    $journal_entries_id = $_POST['journal_entries_id'];
    $sql = "UPDATE journal_entries SET delete_flag = 1 WHERE journal_entries_id = '$journal_entries_id'";
  }
  if($conn->query($sql)){
    $_SESSION['success'] = 'Journal Deleted successfully';
  }
  else{
    $_SESSION['error'] = $conn->error;
  }
  $conn->close();
  header('location: ../journal_entry.php');
}

function journalList(){
  include 'conn.php';
  $sql = "SELECT journal_id, journal_name FROM journal";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['journal_id']."'>".$prow['journal_name']."</option>
      ";
  }
  $conn->close();
}

function journalListEntry(){
  include 'conn.php';
  $sql = "SELECT journal_id, journal_name FROM journal";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['journal_name']."'>".$prow['journal_name']."</option>
      ";
  }
  $conn->close();
}

function allowedJournalList(){
  include 'conn.php';
  $sql = "SELECT journal_id, journal_name FROM journal";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['journal_id']."'>".$prow['journal_name']."</option>
      ";
  }
  $conn->close();
}
// for JOURNAL LIST PERIODS
if(isset($_POST['#'])){
  journalEntryTableList();
}
function journalEntryTableList(){
  include 'conn.php';
  if(isset($_POST['#'])){
    $journal_id = $_POST['journal'];
    $sql = "SELECT journEntry.journal_entries_id, journEntry.journal_id, journEntry.date, journEntry.journal_entries_code, journEntry.partner, journEntry.reference, journEntry.total, journEntry.type, journEntry.status, journ.journal_name FROM journal_entries as journEntry INNER JOIN journal as journ ON journEntry.journal_id = journ.journal_id WHERE journEntry.journal_id='$journal_id' AND delete_flag = 0";
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
    $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
    $type = ($row['type'])?'<span class="badge text-bg-warning pull-right">Credit</span>':'<span class="badge text-bg-info pull-right">Debit</span>';
    ?>
<tr>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['journal_entries_code']; ?></td>
    <td><?php echo $row['partner']; ?></td>
    <td><?php echo $row['reference']; ?></td>
    <td><?php echo $row['journal_name']; ?></td>
    <td><?php echo $row['total']; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $status; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['journal_entries_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['journal_entries_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}
  $conn->close();
}

// account list type selection in journal queries(Account name)
function accountListTypeSelection(){
  include 'conn.php';
  $sql = "SELECT account_type_list_id, account_name FROM account_type_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['account_name']."'>".$prow['account_name']."</option>
      ";
  }
  $conn->close();
}

// Add new Account List

if(isset($_POST['addNewAccountList'])){
  accountListCreate();
}
  function accountListCreate(){
  include 'conn.php';
  if(isset($_POST['addNewAccountList'])){
    $accountId = $_POST['account_id'];
    $accountCode = $_POST['account_code'];
    $accountDescript = $_POST['account_descript'];
    $accountName = $_POST['account_name'];
    $accountAllowRecon = $_POST['account_allowRecon'];
    $accountDebit = $_POST['account_debit'];
    $accountCredit = $_POST['account_credit'];
    $accountBalance = $_POST['account_balance'];
    $accountTax = $_POST['account_tax'];
    $accountTag = $_POST['account_tag'];
    $journalId = $_POST['journal'];
    
    $sql = "INSERT INTO `account_list`(`account_id`, `account_code`, `account_description`, `account_name`, `allow_reconciliation`, `debit`, `credit`, `opening_balance`, `default_taxes`, `tags`, `journal_id`) VALUES ('$accountId','$accountCode','$accountDescript','$accountName','$accountAllowRecon','$accountDebit','$accountCredit','$accountBalance','$accountTax','$accountTag','$journalId')";
  
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }
$conn->close();
header('location: ../account_list.php');
}

//SHOW ACCOUNT LIST TABLE
function accountListTable(){
  include 'conn.php';
  $sql = "SELECT acct.account_id, acct.account_code, acct.account_description, acct.debit, acct.credit, acct.opening_balance, acct.default_taxes, acct.tags, acct.allow_reconciliation, acct.journal_id, acctype.account_name, journ.journal_name, acct.delete_flag FROM account_type_list acctype INNER JOIN account_list AS acct ON acctype.account_name = acct.account_name INNER JOIN journal as journ ON journ.journal_id = acct.journal_id WHERE acct.delete_flag = 0;";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $allowRelo = ($row['allow_reconciliation'])?'<span class="badge text-bg-success pull-right">YES</span>':'<span class="badge text-bg-danger pull-right">NO</span>';
    
    ?>
<tr>
    <td><?php echo $row['account_code']; ?></td>
    <td><?php echo $row['account_description']; ?></td>
    <td><?php echo $row['account_name']; ?></td>
    <td><?php echo $allowRelo; ?></td>
    <td><?php echo $row['debit']; ?></td>
    <td><?php echo $row['credit']; ?></td>
    <td><?php echo $row['opening_balance']; ?></td>
    <td><?php echo $row['default_taxes']; ?></td>
    <td><?php echo $row['tags']; ?></td>
    <td><?php echo $row['journal_name']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['account_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['account_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}

// EDIT ACCOUNT LIST
if (isset($_POST['editAccountingList'])) {
  accountEdit();
}
  function accountEdit(){
    include 'conn.php';
    if(isset($_POST['editAccountingList'])){
      $accountId = $_POST['account_id'];
      $accountCode = $_POST['account_code'];
      $accountDescript = $_POST['account_descript'];
      $accountName = $_POST['account_name'];
      $accountAllowRecon = $_POST['account_allowRecon'];
      $accountDebit = $_POST['account_debit'];
      $accountCredit = $_POST['account_credit'];
      $accountBalance = $_POST['account_balance'];
      $accountTax = $_POST['account_tax'];
      $accountTag = $_POST['account_tag'];
      $journalId = $_POST['journal'];
     
      $sql = "UPDATE account_list SET account_code = '$accountCode', account_description = '$accountDescript', account_name ='$accountName', allow_reconciliation ='$accountAllowRecon', debit ='$accountDebit', credit ='$accountCredit', opening_balance ='$accountBalance', default_taxes ='$accountTax', tags ='$accountTag', journal_id = '$journalId' WHERE  account_id ='$accountId'";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location: ../account_list.php');
  }

  // DELETE ACCOUNT LIST
  if(isset($_POST['deleteAccountList'])){
    accountListDelete();
  }
  function accountListDelete(){
    include 'conn.php';
    if(isset($_POST['deleteAccountList'])){
      $accountId = $_POST['account_id'];
      $sql = "UPDATE account_list SET delete_flag = 1 WHERE account_id = '$accountId'";
    }
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee deleted successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
    $conn->close();
    header('location: ../account_list.php');
  }
//SHOW TAXES TABLE
function taxTable(){
  include 'conn.php';
  $sql = "SELECT `tax_id`, `tax_name`, `type`, `amount`, `scope`, `active`, `delete_flag` FROM `taxes` WHERE delete_flag=0";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $active = ($row['active'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
    
    ?>
<tr>
    <td><?php echo $row['tax_name']; ?></td>
    <td><?php echo $row['type']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['scope']; ?></td>
    <td><?php echo $active; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['tax_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['tax_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}

?>