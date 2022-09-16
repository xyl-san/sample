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
                <div class="card-header" style="background-color:#ffeccc;">
                    <h4>Credit Notes</h4>
                    <button type="button" data-bs-target="#addCreditNotes" data-bs-toggle="modal" class="btn btn-outline-success btn-sm btn-flat mt-2">
                        <span>
                            <i class="fa-solid fa-file-signature"></i>
                            Create Credit Notes
                        </span>
                </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Customer</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Sales Person</th>
                                <th>Tax Excluded</th>
                                <th>Total in Currency</th>
                                <th>Amount Due</th>
                                <th>Credit Note Currency</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php creditNotesTable() ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Number</th>
                                <th>Customer</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Sales Person</th>
                                <th>Tax Excluded</th>
                                <th>Total in Currency</th>
                                <th>Amount Due</th>
                                <th>Credit Note Currency</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
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
                url: 'credit_notes_row.php',
                data: {
                    id: id,
                },
                dataType: 'json',
                success: function(response) {
                    $('.invoice_id').val(response.invoice_id);
                    $('.invoiceCode').val(response.invoice_code);
                    $('.customerInvoice').html(response.customer_firstname +', ' + response.customer_lastname);
                    $('.invoiceDate').val(response.invoice_date);
                    $('.dueDate').val(response.due_date);
                    $('.salesPersonInvoice').html(response.firstname +', ' + response.lastname);
                    $('.salesPersonInvoiceOtherInfo').val(response.firstname+', ' + response.lastname   );
                    $('.currency').val(response.currency);
                    $('.termsInvoice').val(response.terms);
                    $('.paymentReference').val(response.payment_reference);
                    $('.productInvoice').val(response.product_id);
                    $('.labelInvoice').val(response.label);
                    $('.accountInvoice').val(response.account_id);
                    $('.quantityInvoice').val(response.quantity);
                    $('.priceInvoice').val(response.price);
                    $('.taxesInvoice').val(response.taxes);
                    $('.subtotalInvoice').val(response.subtotal);
                    $('.total_amountInvoice').val(response.amount_total);
                    $('.invoiceNotes').val(response.invoice_notes);
                }
            });
        })
    }

    </script>

</body>

</html>
