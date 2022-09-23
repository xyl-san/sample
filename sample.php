<?php include 'includes/queries.php';?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/styles.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <div id="content" class="w-50">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5>Student Info</h5>
                    </div>
                    <div class="row">
                        <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                            <div class="col-md-6 form-floating px-2">

                                <select name="studentList" id="studenList">
                                    <option value="">Please select student list</option>
                                    <?php studentListTable();?>

                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>
</body>

</html>