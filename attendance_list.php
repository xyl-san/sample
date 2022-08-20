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
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal"
                        data-bs-target="#newAttendance">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <nav aria-label="breadcrumb" class="float-end">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php attendanceTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Tools</th>
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
            $('#editAttendance').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete').modal('show');
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
        $(document).ready(function(){
            $.ajax({
            type: 'POST',
            url: 'attendance_row.php',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                $('.attendance_id').val(response.attendance_id);
                $('.firstName').val(response.firstname);
                $('.lastName').val(response.lastname);
                $('.dateInfo').val(response.date);
                $('.timeOut').val(response.time_out);
                $('.timeIn').val(response.time_in);
            }
            });

        }) 
    }
    </script>
</body>

</html>