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
            <div class="card">
                <div class="card-header" style="background-color:#ffeccc;">
                    <h4>Invoices</h4>
                    <button type="button" class="btn btn-outline-success btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#">
                        <span>
                            <i class="fa-solid fa-file-signature"></i>
                            Create Invoices
                        </span>
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Tax Encluded</th>
                                <th>Payment Status</th>
                                <th>Payment Terms</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Tax Encluded</th>
                                <th>Payment Status</th>
                                <th>Payment Terms</th>
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