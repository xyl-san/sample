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
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#newJob">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <div aria-label="breadcrumb" class="breadcrumbs float-end mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Job ID</th>
                                <th scope="col">List of Employees</th>
                                <th scope="col">Department</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php jobTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Job ID</th>
                                <th scope="col">List of Employees</th>
                                <th scope="col">Department</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Tools</th>
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editJob').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteJob').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'job_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.jobId').val(response.job_id);
                    $('.jobDescription').val(response.description);
                    $('.jobRate').val(response.rate);
                    $('.JobCreateOn').val(response.created_on);
                    $('.jobUpdatedon').val(response.updated_on);
                    $('.delete_job').html(response.description);
                }
            });

        })
    }

    // $(document).ready(function(){
    //     $("#deptSelect").on('change', function(){
    //         var dept_id = $(this).val();
    //         $.ajax({
    //             url: 'get_rows.php',
    //             type: 'POST',
    //             data: {
    //                 depart_id: dept_id,
    //                 getJobs: true,
    //             },
    //             dataType: 'json',
    //             success:function(response){
                
    //                 var len = response.length;
                
    //                 $("#jobSelect").empty().append("<option value=''>- Select -</option>");

    //                 for( var i = 0; i<len; i++){
    //                     var job_id = response[i]['job_id'];
    //                     var job_name = response[i]['job_name'];

    //                     $("#jobSelect").append("<option value='"+job_id+"'>"+job_name+"</option>");
    //                 }
    //             }
    //         });
    //     });
    // });
    // Gonna use this later


    </script>
</body>

</html>