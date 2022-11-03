<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper" id="employeeWrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100 mx-4">
            <div class="row">
                <div class="col-9">
                    <div class="container-fluid">
                        <div class="row me-0 ms-0 mb-4 gx-2">
                            <div class="shadow-sm col card m-2 border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Total number of employees</h5>
                                    <div class="d-flex justify-content-center w-0">
                                        <i class="bi bi-people fa-5x"></i>
                                        <h1>25</h1>


                                    </div>
                                </div>
                            </div>

                            <div class="shadow-sm col card m-2 border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Employees per department</h5>
                                    <div class="d-flex justify-content-center">
                                        <i class="bi bi-person-workspace fa-5x"></i>
                                        <h1>5</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="shadow-sm col card m-2 border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Jobs per Department</h5>
                                    <div class="d-flex justify-content-center">
                                        <i class="bi bi-briefcase fa-5x"></i>
                                        <h1>2</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>

                        <ul class="nav nav-tabs" id="employeeTab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="employeeTableTab" data-bs-toggle="tab"
                                    data-bs-target="#employeeTable" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">List of Employees</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="employeeSchedTab" data-bs-toggle="tab"
                                    data-bs-target="#employeeSchedule" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">Employee Schedules</button>
                            </li>

                        </ul>

                        
                        <div id="employeeTabContent" class="tab-content">

                            <div id="employeeTable" class="card tab-pane fade show active  border-0" role="tabpanel"
                                aria-labelledby="employeeTableTab" tabindex="0">
                                <div class="card-header">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"
                                            data-bs-target="#newEmployee">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                                Add new employee
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <div class="shadow-sm card-body">
                                    <div class="table-responsive ">
                                        <table id="employeelist" class="table table-borderless">
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

                            </div> <!-- employeeTable -->

                            <div id="employeeSchedule" class="card tab-pane fade border-0" role="tabpanel"
                                aria-labelledby="employeeSchedTab" tabindex="0">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal"
                                        data-bs-target="#newSchedule">
                                        <span>
                                            <i class="fa fa-plus"></i>
                                            New
                                        </span>
                                    </button>
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
                        <!-- employeeSchedule -->
                    </div>
                </div>

                <div class="shadow-md card col border-0">
                    <div class="card-body">
                        <p>
                            IM A DUMMY......
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            DATA
                        </p>
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
                    $('.departmentSelection').html(response.department_name).val(response
                        .department_id);
                    $('.del_employee_name').html(response.firstname + ' ' + response.lastname);
                    $('.scheduleSelection').html(response.time_in + ' ' + response.time_out).val(
                        response.schedule_id);
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
                    $('.timeIn').val(response.time_in);
                    $('.timeOut').val(response.time_out);
                }
            });

        })
    }

    $('.sidetoggles').on('click', function() {
        toggleChev('#chev');
    })


    function toggleChev(x) {
        x.classList.toggle("fa-chevron-up");
    }
    </script>
</body>

</html>