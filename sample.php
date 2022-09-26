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
        <div id="content" >
            <div class="card">
                <div class="card-header">
                    <span class="">Student Info</span>
                    <span><button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addStudent"
                            type="button"><i class="fa-solid fa-user-plus"></i></button></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table" id="sample">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Course Description</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php studentInfoTable();?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>

    <script type="text/javascript">     
   $(function() {
            $('#sample').on('click', '.edit', function(e) {
                e.preventDefault();
                $('#updateStudent').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

            $('#sample').on('click', '.delete', function(e) {
                e.preventDefault();
                $('#deleteStudent').modal('show');
                var id = $(this).data('id');
                getRow(id);
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
                    $('.course_descript').html(response.description);
                }
            });

        })
    }
    </script>
</body>

</html>