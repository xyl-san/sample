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
                        data-bs-target="#newDepartment">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <nav aria-label="breadcrumb" class="float-end">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Department</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Department</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php departmentTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Department ID</th>
                                <th>Department</th>
                                <th>Created On</th>
                                <th>Updated On</th>
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
            $('#editDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function(){
            $.ajax({
            type: 'POST',
            url: 'department_row.php',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                $('.department_id').val(response.department_id);
                $('.department').val(response.department_name);
                $('.createdOn').val(response.created_on);
                $('.updatedOn').val(response.updated_on);
                $('.delete_department_name').html(response.department_name);
               
            }
            });

        }) 
    }
    </script>
</body>

</html>