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
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#newEmployee">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <nav aria-label="breadcrumb" class="float-end">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employees</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
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
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
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
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editEmployee').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteEmployee').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.photo', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'employee_row.php',
                data: {
                    id: id
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
                    $('.jobSelection').html(response.description);
                    $('.departmentSelection').html(response.department_name);
                    $('.del_employee_name').html(response.firstname + ' ' + response.lastname);
                    $('.scheduleSelection').html(response.time_in + ' ' + response.time_out);

                }
            });

        })
    }
    </script>
</body>

</html>