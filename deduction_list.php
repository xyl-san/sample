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
                                <th>Deduction ID</th>
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
                                <th>Deduction ID</th>
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
        $(document).ready(function(){
            $.ajax({
            type: 'POST',
            url: 'deduction_row.php',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                $('.deduction_id').val(response.deduction_id);
                $('.deductionDescription').val(response.description);
                $('.deductionAmount').val(response.amount);
                $('.employeeSelection').val(response.employee_id);
                $('.delete_deduction').html(response.firstname+ ' ' +response.lastname+ ' ' +response.description);
               
            }
            });

        }) 
    }
    </script>
</body>

</html>