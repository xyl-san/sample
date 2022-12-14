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
<?php include 'header.php'; ?>
    <div class="wrapper">
    <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal"
                        data-bs-target="#newInventory">
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
                                <th>Photo</th>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Stocks</th>
                                <th>Updated on</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php inventoryTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Stocks</th>
                                <th>Updated on</th>
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
            $('#editInventory').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteInventory').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'inventory_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.cashadvanceId').val(response.cashadvance_id);
                    $('.cashadvanceDate').val(response.date_advance);
                    $('.employeeCashadvance').val(response.employee_id);
                    $('.cashadvanceAmount').val(response.amount);
                    $('.delete_cashadvance').html(response.firstname + ' ' + response.lastname);
                }
            });

        })
    }
    </script>
</body>

</html>