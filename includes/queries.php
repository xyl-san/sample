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
       
        $sql = "UPDATE employees SET firstname = '$firstName', lastname = '$lastName', address = '$addressInfo', birthdate = '$birthDate', contact_info = '$contactInfo', gender = '$genderSelection', department_id = '$departmentSelection', job_id = '$jobSelection', schedule_id = '$scheduleSelection' WHERE employee_id = '$employee_id'";
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
      $sql = "UPDATE employees SET delete_flag = 1 WHERE employee_id = '$employee_id'";
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

function accountListSelection(){
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
  $sql = "SELECT accountgroup_id, name FROM group_list";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['accountgroup_id']."'>".$prow['name'];"</option>
      ";
  }
}
function addToList(){
  include 'conn.php';
  $sql = "INSERT INTO employees (employee_code, firstname, lastname, address, birthdate, contact_info, gender, job_id, department_id, schedule_id, photo, created_on) VALUES ('$employee_code','$firstName', '$lastName', '$addressInfo', '$birthDate', '$contactInfo', '$genderSelection', '$jobSelection', '$departmentSelection', '$scheduleSelection', '$filename', NOW() )";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['accountgroup_id']."'>".$prow['name'];"</option>
      ";
  }
}
function accountListTable(){
  include 'conn.php';
  $sql = "SELECT account_id, name, description, status, date_created FROM account_list";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
    ?>
<tr>
    <td><?php echo $row['account_id']; ?></td>
    <td><?php echo $row['date_created']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $status; ?></td>
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

if (isset($_POST['addAccountList'])) {
  addAccountList();
}
function addAccountList(){
  include 'conn.php';
  if(isset($_POST['addAccountList'])){
    $accountName = $_POST['accountName'];
    $accountDescription = $_POST['accountDescription'];
    $accountStatus = $_POST['accountStatus'];
   
    $sql = "INSERT INTO account_list (name, description, status, date_created) VALUES ('$accountName','$accountDescription','$accountStatus', NOW() )";
    if($conn->query($sql)){
      echo "success";
    }
    else{
      echo "error";
    }
  }

  header('location:../account_list.php');
}

if (isset($_POST['editAccountList'])) {
editAccountList();
}
  function editAccountList(){
    include 'conn.php';
    if(isset($_POST['editAccountList'])){
      $account_id = $_POST['account_id'];
      $accountName = $_POST['name'];
      $accountDescription = $_POST['description'];
      $accountStatusSelection = $_POST['status'];
      $sql = "UPDATE account_list SET name = '$accountName', description = '$accountDescription', status = '$accountStatusSelection' WHERE account_id = '$account_id'";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    header('location:../account_list.php');
  }

  if(isset($_POST['deleteAccountList'])){
    accountListDelete();
  }
  function accountListDelete(){
    include 'conn.php';
    if(isset($_POST['deleteAccountList'])){
      $account_id = $_POST['account_id'];
      $sql = "DELETE FROM account_list WHERE account_id = '$account_id'";
    }
    if($conn->query($sql)){
      $_SESSION['success'] = 'Account list deleted successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
    header('location: ../account_list.php');
  }

  
  function groupListTable(){
    include 'conn.php';
    $sql = "SELECT accountgroup_id, name, description, type, status, date_created FROM group_list";
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
      $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Active</span>':'<span class="badge text-bg-danger pull-right">Inactive</span>';
      $type = ($row['type'])?'<span class="badge text-bg-warning pull-right">Credit</span>':'<span class="badge text-bg-info pull-right">Debit</span>';
      ?>
        <tr>
            <td><?php echo $row['accountgroup_id']; ?></td>
            <td><?php echo $row['date_created']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $type; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['accountgroup_id']; ?>"><i
                        class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['accountgroup_id']; ?>"><i
                        class="fa fa-trash"></i> Delete</button>
            </td>
        </tr>
<?php
    }
  }
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
     
      $sql = "INSERT INTO group_list (name, description,type, status, date_created) VALUES ('$name','$description','$type','$status', NOW() )";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
  
    header('location:../account_group.php');
  }

  if (isset($_POST['editGroupList'])) {
    editGroupList();
    }
      function editGroupList(){
        include 'conn.php';
        if(isset($_POST['editGroupList'])){
          $groupId = $_POST['accountgroup_id'];
          $groupName = $_POST['name'];
          $groupDescription = $_POST['description'];
          $groupTypeSelection = $_POST['type'];
          $groupStatusSelection = $_POST['status'];
          $sql = "UPDATE group_list SET name = '$groupName', description = '$groupDescription',type='$groupTypeSelection', status = '$groupStatusSelection' WHERE accountgroup_id = '$groupId'";
          if($conn->query($sql)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        header('location:../account_group.php');
      }

      if (isset($_POST['deleteGroupList'])) {
        groupListDelete();
      }
      function groupListDelete(){
        include 'conn.php';
        if(isset($_POST['deleteGroupList'])){
          $groupId = $_POST['accountgroup_id'];
          $sql = "DELETE FROM group_list WHERE accountgroup_id = '$groupId'";
        }
        if($conn->query($sql)){
          $_SESSION['success'] = 'Group list deleted successfully';
        }
        else{
          $_SESSION['error'] = $conn->error;
        }
        header('location:../account_group.php');
      }


    if(isset($_POST['addJournalEntry'])){
        journalEntryNew();
    }
    function journalEntryNew(){
      include 'conn.php';
      if(isset($_POST['addJorunalList'])){
        $groupId = $_POST['accountgroup_id'];
        $groupName = $_POST['name'];
        $groupDescription = $_POST['description'];
        $groupTypeSelection = $_POST['type'];
        $groupStatusSelection = $_POST['status'];

        $sql = "INSERT INTO journal_items (journal_id, account_id, accountgroup_id, amount, date_created) VALUES ('$journal_id','$account_id','$accountgroup_id','$amount',NOW())";
        
      }
      if($conn->query($sql)){
        $_SESSION['success'] = 'Added New Journal Entry!';
      }
      else{
        $_SESSION['error'] = $conn->error;
      }
      header('location: ../account_list.php');

    }

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
        header('location: ../crm.php');
      }

  //CRM Change Stage
  if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 1 : lead(); break;
        case 2 : opportunity(); break;
        case 3 : proposition(); break;
        case 4 : won(); break;
        case 5 : lost(); break;
    }
}

  function lead(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '1' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function opportunity(){
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
  function won(){
    require_once('conn.php');
    $lead_id  = intval($_POST['lead_id']);

     //SQL query to get results from database
    $sql = "UPDATE leads SET stage_id = '4' where lead_id = $lead_id";
    $conn->query($sql);

    $conn->close();
    //send a JSON encded array to client

    echo json_encode(array('success'=>1));

  }
  function lost(){
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
    $sql = "UPDATE leads SET delete_flag = '1' where lead_id = '$lead_id'";
    $conn->query($sql);

    $conn->close();

    echo json_encode(array('success'=>1));
  }
   //Lead Delete

?>