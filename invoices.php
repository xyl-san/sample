<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="create_invoice.php" type="button"
                        class="btn btn-outline-success btn-sm btn-flat mt-2">
                        <span>
                            <i class="fa-solid fa-file-signature"></i>
                            Create Invoices
                        </span>
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Due Date</th>
                                <th>Terms</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Tax Encluded</th>
                                <th>Total Amount</th>
                                <th>Invoice Date</th>
                                <th>Payment Terms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php invoicesTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Due Date</th>
                                <th>Terms</th>
                                <th>Customer</th>
                                <th>Particulars</th>
                                <th>Tax Encluded</th>
                                <th>Total Amount</th>
                                <th>Invoice Date</th>
                                <th>Payment Terms</th>
                                <th>Actions</th>
                            </tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    $(function() {
        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteInvoice').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editInvoice').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
      
    });
    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'invoice_row.php',
                data: {
                    id: id,
                },
                dataType: 'json',
                success: function(response) {
                    $('.invoiceId').val(response.invoice_id);
                    $('.invoiceCode').val(response.invoice_code);
                    $('.customerId').html(response.customer_firstname +', ' + response.customer_lastname);
                    $('.invoiceDate').val(response.invoice_date);
                    $('.dueDate').val(response.due_date);
                    $('.employeeId').html(response.firstname +', ' + response.lastname);
                    $('.salesPersonInvoiceOtherInfo').val(response.firstname+', ' + response.lastname   );
                    $('.currency').val(response.currency);
                    $('.terms').val(response.terms);
                    $('.paymentReference').val(response.payment_reference);
                    $('.productId').val(response.product_id);
                    $('.label').val(response.label);
                    $('.accountId').val(response.account_id);
                    $('.quantity').val(response.quantity);
                    $('.price').val(response.price);
                    $('.taxes').val(response.taxes);
                    $('.subtotal').val(response.subtotal);
                    $('.total_amount').val(response.amount_total);
                    $('.invoiceNotes').val(response.invoice_notes);
                }
            });
        })
    }

    </script>

</body>

</html>