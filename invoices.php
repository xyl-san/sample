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
                <div class="card-body">
                    <div class="row">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="25" aria-valuemax="100">25%
                            </div>
                        </div><br>
                        <div class="col-4">
                            <h5 class="card-title">Company Data</h5>
                            <p class="card-text">Set your company's data for documents header/footer.</p>
                            <div class="col-md-12 text-center">
                                <a data-bs-target="#" class="btn btn-outline-success btn-sm btn-flat mt-2"
                                    data-bs-toggle="modal">Let's Start!</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <h5 class="card-title">Invoice Layout</h5>
                            <p class="card-text">Customize the look of your invoices</p>
                            <div class="col-md-12 text-center">
                                <a data-bs-target="#" class="btn btn-outline-success btn-sm btn-flat mt-2"
                                    data-bs-toggle="modal">Customize</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <h5 class="card-title">Create Invoice</h5>
                            <p class="card-text">Create your first invoice.</p>
                            <div class="col-md-12 text-center">
                                <a data-bs-target="#" class="btn btn-outline-success btn-sm btn-flat mt-2"
                                    data-bs-toggle="modal">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color:#ffeccc;">
                    <h4>Invoices</h4>
                    <a href="customer_list_invoice.php" type="button" class="btn btn-outline-success btn-sm btn-flat mt-2">
                        <span>
                            <i class="fa-solid fa-file-signature"></i>
                            Create Invoices
                        </span>
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Due Date</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Tax Encluded</th>
                                <th>Total Amount</th>
                                <th>Invoice Date</th>
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
                                <th>Due Date</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Tax Encluded</th>
                                <th>Total Amount</th>
                                <th>Invoice Date</th>
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
