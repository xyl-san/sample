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
        <nav id="sidebar" class="flex-shrink-0 p-3" style="width: 280px;">
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
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal"
                        data-bs-target="#newDeduction">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php deductionTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Employee</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Deduction Modals -->
    <div class="modal fade" id="newDeduction" tabindex="-1" role="dialog" aria-labelledby="deductTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deductTitle">Add a new Employee Deduction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="#" method="POST" autocomplete="off">
                        <div class="col-md-12 form-floating">
                            <select class="form-control" name="employeeId" aria-label="Select employee">
                                <option value="" class="employeeSelection" selected>- Select -</option>
                                <?php employeeSelection();?>
                            </select>
                            <label for="employeeSelection">Employee</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <textarea class="form-control deductionDescription" name="description" placeholder="Elaborate on the deduction" required></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input type="number" class="form-control deductionAmount" name="amount" placeholder="123456789" required>
                            <label for="amount">Amount</label>
                        </div>
                        <div class="mb-2">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary float-end" name="deductAdd">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDeduction" tabindex="-1" role="dialog" aria-labelledby="deductTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deductTitle">Edit a deduction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="#" method="POST" autocomplete="off">
                        <input type="hidden" class="deduction_id" name="deductionid">
                        <div class="col-md-12 form-floating">
                            <select class="form-control" name="employeeId" aria-label="Select employee">
                                <option value="" class="employeeSelection" selected>- Select -</option>
                                <?php employeeSelection();?>
                            </select>
                            <label for="employeeSelection">Employee</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <textarea class="form-control deductionDescription" name="description" placeholder="Elaborate on the deduction" required></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="col-md-12 form-floating">
                            <input type="number" class="form-control deductionAmount" name="amount" placeholder="123456789" required>
                            <label for="amount">Amount</label>
                        </div>
                        <div class="mb-2">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary float-end" name="deductEdit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteDeduction" tabindex="-1" role="dialog" aria-labelledby="deductTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deductTitle">Delete a deduction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" class="deduction_id" name="deductionid">
                        <div class="text-center">
                            <p>
                                Are you sure you want to delete this deduction?
                            </p>
                        </div>
                        <div class="mb-2">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary float-end" name="deductDelete">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Deduction Modals -->

    <?php include 'includes/scripts.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editDeduction').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteDeduction').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'get_rows.php',
                data: {
                    id: id,
                    deductRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.deduction_id').val(response.deduction_id);
                    $('.deductionDescription').val(response.description);
                    $('.deductionAmount').val(response.amount);
                    $('.employeeSelection').val(response.employee_id).html(response.firstname + ' ' + response.lastname);
                }
            });
        })
    }
    </script>
</body>

</html>