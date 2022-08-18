<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="content">
            <?php include 'header.php'; ?>
            <div class="box">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#newEmployee">
                        <span>
                            <i class="fa fa-plus"></i>
                             New
                        </span>
                    </button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table" style="width:100%">
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

    <?php include 'modals.php';?>
    <?php include 'includes/scripts.php';?>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>