<?php include 'includes/sample.php';?>
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
            <div class="row">
                <div class="card form-control bg-dark bg-gradient text-white bg-opacity-60">
                    <div class="card-header">
                        <h1 style="text-align:center;">INVOICE</h1>
                        <h5 style="text-align:center;">This is a subtitle</h5>
                        <button><span>
                                <i class="fa-solid fa-file-signature"></i>
                                Create Receipt
                            </span></button>


                    </div>
                </div>
            </div>
            <!-- start of form invoice content -->
            <div class="content">
                <div class="row">
                    <div class="card bg-primary text-dark bg-opacity-10">
                        <div class="card-body">
                            <form class="row g-3" action="includes/sample.php" method="POST" autocomplete="off"
                                id="create_invoice">

                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text cusInvoiceID" name="cus_invoice_id">Customer
                                            Invoice Number</span>
                                        <input type="text" class="form-control invoiceId text-dark" name="invoice_id" readonly
                                        value="INV-<?php echo (new DateTime())->format('mY'); ?>-00<?php invoiceCode();?>" style="--bs-text-opacity: .5;">
                                    </div>
                                </div>
                                <div class="col-md-6 border  form-group shadow p-0 mb-6 bg-body rounded">
                                    <div class="bg-success" style="--bs-bg-opacity: .25;">
                                        <h5 class="p-2"> Customer Information </h5>
                                        <button
                                            class="mb-2 ms-2 btn btn-default text-white bg-success bg-gradient btn-flat btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#selectCustomer" id="add_to_list"
                                            type="button"><i class="fa fa-plus"></i> Select Existing
                                            Customer</button>
                                    </div>
                                    <div class="row g-2 m-1">
                                        <div class="col-6 py-1 form-floating">
                                            <input type="text" class="form-control customerName" name="customer_name"
                                                id="customer_name" required>
                                                <label for="">Customer Name</label>
                                        </div>
                                        <div class=" col-6 py-1 form-floating">
                                            <input type="number" class="form-control customerContact"
                                                name="customer_contact" id="customer_phone"
                                                required>
                                                <label for="">Contact Number</label>
                                        </div>
                                        <div class=" col-6 py-1 form-floating">
                                            <input type="text" class="form-control customerAddress " name="address"
                                                id="customer_address_1" required>
                                                <label for="">Address</label>
                                        </div>
                                        <div class=" col-6 py-1 form-floating">
                                            <input type="email" class="form-control customerEmail" id="customer_email"
                                                name="customer_email" required>
                                                <label for="">E-mail Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 px-4 ">
                                    <div class="row shadow p-2 mb-6 bg-body rounded">
                                        <div class="col-5">
                                            <span class="align-middle"><label for="invoiceDate"
                                                    class="form-label invoiceDate">
                                                    <h5>Invoice Date</h5>
                                                </label></span>
                                            <input type="date" class="form-control invoiceDate" id="invoice_date"
                                                name="invoice_date" required
                                                value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-7"></div>
                                        <div class="col-5 py-5">
                                            <span class="align-middle"><label for="invoiceDate"
                                                    class="form-label invoiceDate">
                                                    <h5>Due Date</h5>
                                                </label></span>
                                            <input type="date" class="form-control dueDate" name="invoice_duedate"
                                                id="due_date">
                                        </div>
                                        <div class="col-1 py-5">
                                            <br>
                                            <br>
                                            <span class="align-middle">
                                                <label for="invoiceDate" class="form-label invoiceDate">
                                                    <h6>OR</h6>
                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-5 py-5">
                                            <span class="align-middle"><label for="invoiceDate"
                                                    class="form-label invoiceDate">
                                                    <h5>Terms</h5>
                                                </label></span>
                                            <select class="form-control terms" name="terms"
                                                aria-label="Select termsType" id="termsType">
                                                <option value="15 Days" class="terms">15 Days</option>
                                                <option value="30 Days" class="terms">30 Days</option>
                                                <option value="60 Days" class="terms">60 Days</option>
                                                <option value="90 Days" class="terms">90 Days</option>
                                                <option value="0" class="terms" selected></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="salesPerson" class="form-label">
                                                <h6>Sales Person</h6>
                                            </label>
                                            <button
                                                class="mb-2 ms-2 btn btn-default text-white bg-success bg-gradient btn-flat btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#selectSalesPerson"
                                                id="add_to_list" type="button"><i class="fa fa-plus"></i> Select
                                                Employee
                                            </button>
                                            <input type="text" class="form-control salesPerson" id="salesPerson"
                                                name="sales_person">
                                        </div>
                                        <div class="col p-2">
                                            <label for="paymentReference" class="form-label">
                                                <h6>Payment Reference</h6>
                                            </label>
                                            <input type="text" class="form-control text-uppercase paymentReference"
                                                id="paymentReference" name="payment_reference">
                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-6 p-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="invoiceDate" class="form-label">
                                                <h6>Currency</h6>
                                            </label>
                                            <select class="form-control currencyType" name="currency"
                                                aria-label="Select customer" id="currencyType" required>
                                                <option value="PHP" class="currencyType" selected>PHP</option>
                                                <option value="USD" class="currencyType">USD</option>
                                                <option value="" class="currencyType"></option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="journal" class="form-label">
                                                <h6>Journal</h6>
                                            </label>
                                            <input type="journal" class="form-control journal" name="journal"
                                                id="journal" value="Customer Invoice">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">

                                </div>

                                <div class="mb-2">
                                    <!-- <input class="btn btn-outline-success btn-sm" type="submit"
                                        name="addCustomerInvoice" value="SAVE"> -->
                                </div>
                                <!-- start of dynamic product content -->
                                <div class="card shadow p-3 mb-2 bg-body rounded" id="scrollspyHeading2">
                                    <div class="card-body">
                                        <!-- fixed table -->
                                        <div class="py-2">
                                            <button type="button" class="btn btn-success btn-sm add-row-invoice"><i
                                                    class="fa-regular fa-square-plus  "></i> Add Product</button>
                                        </div>

                                        <table class="table table-bordered table-hover table-striped"
                                            id="invoice_table">
                                            <thead class="p-3 mb-2 bg-dark bg-gradient text-white bg-opacity-80">
                                                <tr>
                                                    <th width="250">
                                                        <h6>
                                                            Product
                                                        </h6>
                                                    </th>
                                                    <th width="170">
                                                        <h6>Label</h6>
                                                    </th>
                                                    <th width="150">
                                                        <h6>Account</h6>
                                                    </th>
                                                    <th width="120">
                                                        <h6>Qty</h6>
                                                    </th>
                                                    <th width="200">
                                                        <h6>Price</h6>
                                                    </th>
                                                    <th width="150">
                                                        <h6>Discount</h6>
                                                    </th>
                                                    <th width="200">
                                                        <h6>Sub Total</h6>
                                                    </th>
                                    </div>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="row form-group form-group-sm  no-margin-bottom">
                                                    <div class="col-2">
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger delete-row"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-10">
                                                        <select
                                                            class="form-control form-group-sm invoice_product"
                                                            name="invoice_product[]"  required>
                                                            <option value="" class="invoice_product" selected>
                                                            </option>
                                                            <?php productInvoices();?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <select class="form-control label" name="label[]" 
                                                        required>
                                                        <option value="" class="label" selected>
                                                        </option>
                                                        <?php productDescriptionInvoice();?>
                                                    </select>

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <select class="form-control account" name="account[]" 
                                                        required>
                                                        <option value="" class="account" selected>
                                                        </option>
                                                        <?php accountListInvoice();?>
                                                    </select>

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <input type="number"
                                                        class="form-control invoice_product_qty calculate"
                                                        name="invoice_product_qty[]" value="1">

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class=" row form-group form-group-sm  ">
                                                    <div class="col-auto">
                                                        <label class="visually-hidden"
                                                            for="autoSizingInputGroup">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text"><?php echo CURRENCY ?>
                                                            </div>
                                                            <input type="number"
                                                                class="form-control calculate invoice_product_price required"
                                                                name="invoice_product_price[]"
                                                                aria-describedby="sizing-addon1" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm  no-margin-bottom">
                                                    <input type="text" class="form-control calculate"
                                                        name="invoice_product_discount[]" placeholder="% or Amount">
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class=" row form-group form-group-sm ">
                                                    <div class="col-auto">
                                                        <label class="visually-hidden"
                                                            for="autoSizingInputGroup">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text"><?php echo CURRENCY ?>
                                                            </div>
                                                            <input type="text" class="form-control calculate-sub"
                                                                name="invoice_product_sub[]" 
                                                                value="0.00" aria-describedby="sizing-addon1" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <!-- end fixed table -->
                                    <!-- fixed bottom1 -->
                                    <div class="float-end col-3 px-6 ">
                                        <div class="row form-control py-2 bg-success p-2 text-dark bg-opacity-10">
                                            <div class="">
                                                <div>
                                                    <strong>Sub Total</strong><br>
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="invoice-sub-total">0.00</span>
                                                    <input type="hidden" class="invoiceSubTotal" name="subtotal"
                                                        id="invoice_subtotal">
                                                </div>
                                            </div>
                                            <div class="">
                                                <div>
                                                    <strong>Discount:</strong>
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="invoice-discount">0.00</span>
                                                    <input type="hidden" class="invoiceDiscount" name="discount"
                                                        id="invoice_discount">
                                                </div>
                                            </div>

                                            <div class="">
                                                <?php if (ENABLE_VAT == true) { ?>
                                                <div>
                                                    <strong> TAX/VAT:</strong><br>
                                                    <input type="checkbox" class="remove_vat"> Remove TAX/VAT
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="invoice-vat"
                                                        data-enable-vat="<?php echo ENABLE_VAT ?>"
                                                        data-vat-rate="<?php echo VAT_RATE ?>"
                                                        data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
                                                    <input type="hidden" name="invoice_vat" id="invoice_vat">
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <!-- <div class="row form-control">
                                                            <div class="col-xs-4 col-xs-offset-5">
                                                            <strong class="shipping">Shipping:</strong>
                                                                </div>
                                                        <div class="col-xs-3">
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-addon"><?php echo CURRENCY ?></span>
                                                                <input type="text" class="form-control calculate shipping" name="invoice_shipping"
                                                                    aria-describedby="sizing-addon1" placeholder="0.00">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                        <div class="py-1">
                                            <div class="row form-control p-3 bg-success bg-gradient text-white bg-opacity-50">
                                                <div class="">
                                                    <strong>Total</strong>
                                                </div>
                                                <div class="form-control py-2">
                                                    <?php echo CURRENCY ?>: <span class="invoice-total">0.00</span>
                                                    <input class=" grandTotal" type="hidden" name="grandtotal"
                                                        id="invoice_total">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row justify-content-evenly">
                                        <div class="col-8">
                                            <div class="row form-control">
                                                <label>
                                                    <h6>Remarks</h6>
                                                </label>
                                                    <input type="text" class="form-control notes" name="notes"
                                                id="notes" placeholder="Add Notes">     
                                            </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <!-- end fixed bottom1 -->
                                </div>
                        </div>
                        <!-- end of dynamic product content -->
                        <div class="mb-2 ">
                            <input class="btn  bg-success bg-gradient text-white " id="action_create_invoice"
                                type="submit" name="createNewCustomerInvoice" value="CREATE INVOICE">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of form invoice content -->
    </idv>



    <?php include 'includes/scripts.php';?>
    <?php include 'accounting-modalv2.php';?>

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
                    $('.customerId').html(response.customer_firstname + ', ' + response
                        .customer_lastname);
                    $('.invoiceDate').val(response.invoice_date);
                    $('.dueDate').val(response.due_date);
                    $('.employeeId').html(response.firstname + ', ' + response.lastname);
                    $('.salesPersonInvoiceOtherInfo').val(response.firstname + ', ' + response
                        .lastname);
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
    $(document).ready(function() {

    });
    </script>

</body>

</html>