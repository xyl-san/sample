<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
</head>

<body>
    <div class="wrapper bg-light">
        <nav id="sidebar" class="flex-shrink-0 p-3 bg-light" style="width: 280px;">
            <div class="sidebar-header rounded">
                <h3>Dream System</h3>
                <strong>Boss Panda</strong>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="menu.php">
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#employeeSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle text-wrap">
                        <i class="fa-solid fa-users"></i>
                        Human Resource
                    </a>
                    <ul class="collapse list-unstyled" id="employeeSubmenu">
                        <li>
                            <a href="employees_list.php"> Employees</a>
                            <a href="attendance_list.php">Attendance</a>
                            <a href="cashadvance_list.php">Cash Advance</a>
                            <a href="schedule_list.php">Schedules</a>
                            <a href="department_list.php"> Department</a>
                            <a href="job_list.php"> Jobs</a>
                            <a href="deduction_list.php">Deductions</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"
                        data-bs-target="#newEmployee">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <div aria-label="breadcrumb" class="breadcrumbs float-end mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employees</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="employeelist" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Birthdate</th>
                                    <th scope="col">Job</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php employeeTable();?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Birthdate</th>
                                    <th scope="col">Job</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container scheduleTable m-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal"
                            data-bs-target="#newSchedule">
                            <span>
                                <i class="fa fa-plus"></i>
                                New
                            </span>
                        </button>
                        <span class="fw-bold float-end">Employee Schedules</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="empschedule" class="table">
                                <thead>
                                    <tr>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php scheduleTable();?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php';?>

    <script>

    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#employeelist').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editEmployee').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#employeelist').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteEmployee').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#employeelist').on('click', '.photo', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#editEmployeePhoto').modal('show');
            getRow(id);
        });

        $('#empschedule').on('click', '.schedEdit', function(e) {
            e.preventDefault();
            $('#editSchedule').modal('show');
            var id = $(this).data('id');
            schedRow(id);
        });

        $('#empschedule').on('click', '.schedDelete', function(e) {
            e.preventDefault();
            $('#deleteSchedule').modal('show');
            var id = $(this).data('id');
            schedRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'get_rows.php',
                data: {
                    id: id,
                    empRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.employeeId').val(response.employee_id);
                    $('.firstName').val(response.firstname);
                    $('.lastName').val(response.lastname);
                    $('.addressInfo').val(response.address);
                    $('.birthDate').val(response.birthdate);
                    $('.contactInfo').val(response.contact_info);
                    $('.genderSelection').html(response.gender);
                    $('.jobSelection').html(response.job_name).val(response.job_id);
                    $('.departmentSelection').html(response.department_name).val(response.department_id);
                    $('.del_employee_name').html(response.firstname + ' ' + response.lastname);
                    $('.scheduleSelection').html(response.time_in + ' ' + response.time_out).val(response.schedule_id);
                }
            });
        })
    }

    function schedRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'get_rows.php',
                data: {
                    id: id,
                    empschedRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.schedule_id').val(response.schedule_id);
                    $('.employeeSelection').val(response.firstname + ' ' + response.lastname);
                    $('.scheduleSelection').val(response.time_in + ' ' + response.time_out);
                    $('.delete_schedule').html(response.employee_code + ' ' + response.time_in +
                        ' ' + response.time_out);

                }
            });

        })
    }
    </script>
</body>

</html>