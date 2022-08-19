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
                        data-bs-target="#newEmployee">
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
    </script>
</body>

</html>