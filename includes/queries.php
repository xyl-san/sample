<?php 
function employeeTable(){
  include 'conn.php';
  $sql = "SELECT e.employee_id, e.photo, e.employee_code, e.employee_id, e.firstname, e.lastname, e.address, e.birthdate, e.contact_info, e.gender, e.delete_flag, d.department_name, j.description, s.time_in, s.time_out FROM employees e INNER JOIN department as d on e.department_id=d.department_id INNER JOIN job as j on e.job_id=j.job_id INNER JOIN schedules as s on e.schedule_id=s.schedule_id WHERE e.delete_flag = false;";
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
          <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['employee_id']; ?>"><i class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['employee_id']; ?>"><i class="fa fa-trash"></i> Delete</button>
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

?>