<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="header">
                <h4>Customer List</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Address</th>
                                <th>Vat</th>
                                <th>Tax</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Sales Person</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php customerTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Address</th>
                                <th>Vat</th>
                                <th>Tax</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Sales Person</th>
                            </tr>
                        </tfoot>
                    </table>
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

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: '.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.department_id').val(response.department_id);
                    $('.department').val(response.department_name);
                    $('.delete_department_name').html(response.department_name);

                }
            });

        })
    }
    </script>

</body>

</html>