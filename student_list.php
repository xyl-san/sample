<?php include 'includes/queries.php';?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="wrapper">
        <div id="content" class="w-50">
            <div class="card">
                <div class="card-header">
                    <h6>Student Tables</h6>
                    <button type="button" class="btn btn-info btn-sm" data-bs-target="#createStudent" data-bs-toggle="modal">
                        <i class="fa-solid fa-user-plus"></i>
                    </button>
                </div>

                <div class="card-body">

                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <td>Student ID</td>
                                <td>Student Name</td>
                                <td>Student Address</td>
                                <td>Email</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php studentList(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>
    
<script>
    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editStudent').modal('show');
            var id = $(this).data('id');
            getRow(id)
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteStudent').modal('show');
            var id = $(this).data('id');
            getRow(id)
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'student_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.studentID').val(response.student_id);
                    $('.name').val(response.name);
                    $('.address').val(response.address);
                    $('.email').val(response.email);
                }
            });

        })
    }
</script>


</body>
</html>
