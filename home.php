<?php include 'includes/queries.php';?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
</head>
<body class="toggle-sidebar">
<?php include 'header.php'; ?>  
    <div class="wrapper">
        <div id="content" class="w-100">
            <div class="container">
                <div class="row">
                    <div class="card col p-0">
                        <div class="card-header">
                            <span>Department Statistics</span>
                        </div>
                        <div class="card-body">
                            <div id="departmentChart"></div>
                        </div>
                    </div>
                    <div class="card col p-0">
                        <div class="card-header">
                            <span>Job Statistics</span>
                        </div>
                        <div class="card-body">
                            <div id="jobChart"></div>
                        </div>
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