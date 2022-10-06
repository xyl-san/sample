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
            <div class="row">
                <div class="card form-control" style="background-color:#ffeccc;">
                    <div class="card-header">
                        <h4>BILLS</h4>
                        <button><span>
                                <i class="fa-solid fa-file-signature"></i>
                                Create Vendor Bills
                            </span></button>


                    </div>
                </div>
            </div>
            <!-- start of form invoice content -->
            <div class="content">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text cusInvoiceID" name="cus_invoice_id">Customer
                                            Invoice Number</span>
                                        <input type="text" class="form-control invoiceNum" name="invoice_num" required
                                            placeholder="CINV-2022-0012">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="customer" class="form-label">Customer</label>
                                    <select class="form-control customerId" name="customer_id"
                                        aria-label="Select customer" id="customer" required>
                                        <option value="" class="customerId" selected></option>
                                        <?php customerInvoice();?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="invoiceDate" class="form-label invoiceDate">Invoice Date</label>
                                    <input type="date" class="form-control invoiceDate" id="invoice_date"
                                        name="invoice_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="paymentReference" class="form-label">Payment Reference</label>
                                    <input type="text" class="form-control text-uppercase paymentReference"
                                        id="paymentReference" name="payment_reference">
                                </div>
                                <div class="col-md-3">
                                    <label for="dueDate" class="form-label">Due Date</label>
                                    <input type="date" class="form-control dueDate" name="due_date" id="due_date">
                                </div>
                                <div class="col-md-1">
                                    <h4 class="text-center" style="line-height:4;">or</h4>
                                </div>
                                <div class="col-md-2">
                                    <label for="status" class="form-label">Terms</label>
                                    <select class="form-control terms" name="terms" aria-label="Select termsType"
                                        id="termsType">
                                        <option value="15 Days" class="terms" selected>15 Days</option>
                                        <option value="21 Days" class="terms" selected>21 Days</option>
                                        <option value="30 Days" class="terms" selected>30 Days</option>
                                        <option value="45 Days" class="terms" selected>45 Days</option>
                                        <option value="1 Month" class="terms" selected>1 Month</option>
                                        <option value="2 Months" class="terms" selected>2 Months</option>
                                        <option value="0" class="terms" selected></option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="salesPerson" class="form-label">Sales Person</label>
                                    <select class="form-control salesPerson" name="sales_person"
                                        aria-label="Select salesPerson" required id="salesPerson">
                                        <option value="" class="salesPerson" selected></option>
                                        <?php salesPerson();?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="journal" class="form-label">Journal</label>
                                    <input type="journal" class="form-control journal" name="journal" id="journal"
                                        value="Customer Invoice">
                                </div>
                                <div class="col-md-3">
                                    <label for="invoiceDate" class="form-label">Currency</label>
                                    <select class="form-control currencyType" name="currency"
                                        aria-label="Select customer" id="currencyType" required>
                                        <option value="PHP" class="currencyType" selected>PHP</option>
                                        <option value="USD" class="currencyType" selected>USD</option>
                                        <option value="" class="currencyType" selected></option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <!-- <input class="btn btn-outline-success btn-sm" type="submit"
                                        name="addCustomerInvoice" value="SAVE"> -->
                                </div>
                                <!-- start of dynamic product content -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- fixed table -->
                                        <table class="table table-bordered table-hover table-striped"
                                            id="invoice_table">
                                            <thead>
                                                <tr>
                                                    <th width="250">
                                                        <h6><button type="button"
                                                                class="btn btn-success btn-sm add-row"><i
                                                                    class="fa-regular fa-square-plus  "></i></button>
                                                            Product
                                                        </h6>
                                                    </th>
                                                    <th>
                                                        <h6>Label</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Account</h6>
                                                    </th>
                                                    <th width="120">
                                                        <h6>Qty</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Price</h6>
                                                    </th>
                                                    <th width="200">
                                                        <h6>Discount</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Sub Total</h6>
                                                    </th>
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
                                                                    class="form-control form-group-sm item-input invoice_product"
                                                                    name="product[]" id="product" required>
                                                                    <option value="" class="product" selected>
                                                                    </option>
                                                                    <?php productInvoice();?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="form-group form-group-sm no-margin-bottom">
                                                            <select class="form-control" name="label[]" id="label"
                                                                required>
                                                                <option value="" class="label" selected>
                                                                </option>
                                                                <?php productDescriptionInvoice();?>
                                                            </select>

                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="form-group form-group-sm no-margin-bottom">
                                                            <select class="form-control" name="account[]" id="account"
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
                                                        <div class=" row form-group form-group-sm ">
                                                            <div class="col-auto">
                                                                <label class="visually-hidden"
                                                                    for="autoSizingInputGroup">Username</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text"><?php echo CURRENCY ?>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control calculate invoice_product_price required"
                                                                        name="invoice_product_price[]"
                                                                        aria-describedby="sizing-addon1"
                                                                        placeholder="0.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="text-right">
                                                        <div class="form-group form-group-sm  no-margin-bottom">
                                                            <input type="text" class="form-control calculate"
                                                                name="invoice_product_discount[]"
                                                                placeholder="% or Amount">
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
                                                                    <input type="text"
                                                                        class="form-control calculate-sub"
                                                                        name="invoice_product_sub[]"
                                                                        id="invoice_product_sub" value="0.00"
                                                                        aria-describedby="sizing-addon1" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end fixed table -->
                                        <!-- fixed bottom1 -->
                                        <div class="float-end col-4 px-5">
                                            <div class="row form-control py-2">
                                                <strong>Sub Total:</strong><br>
                                                <div class="col form-control">

                                                    <?php echo CURRENCY ?>: <span class="invoice-sub-total">0.00</span>
                                                    <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                                </div>
                                                <div class="col">
                                                    <strong>Discount:</strong>
                                                </div>
                                                <div class="col form-control">
                                                    <?php echo CURRENCY ?>: <span class="invoice-discount">0.00</span>
                                                    <input type="hidden" name="invoice_discount" id="invoice_discount">
                                                </div>

                                                <?php if (ENABLE_VAT == true) { ?>

                                                <div class="col">
                                                    <strong>TAX/VAT:</strong><br><input type="checkbox"
                                                        class="remove_vat"> Remove
                                                    TAX/VAT
                                                </div>
                                                <div class="col form-control py-2">
                                                    <?php echo CURRENCY ?>: <span class="invoice-vat"
                                                        data-enable-vat="<?php echo ENABLE_VAT ?>"
                                                        data-vat-rate="<?php echo VAT_RATE ?>"
                                                        data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
                                                    <input type="hidden" name="invoice_vat" id="invoice_vat">
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

                                            <div class="row form-control py-2">
                                                <div class="col ">
                                                    <strong>Total:</strong>
                                                </div>
                                                <div class="col form-control py-2">
                                                    <?php echo CURRENCY ?>: <span class="invoice-total">0.00</span>
                                                    <input type="hidden" name="invoice_total" id="invoice_total">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-evenly">
                                            <div class="col-5">
                                                <div class="row form-control">
                                                    <label>
                                                        <h6>ADD NOTES</h6>
                                                    </label>
                                                    <textarea class="form-group form-control" rows="2" cols="50"
                                                        name="comment" form="usrform"> Add Notes...</textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <!-- end fixed bottom1 -->
                                    </div>
                                </div>
                                <!-- end of dynamic product content -->
                                <div class="mb-2">
                                    <input class="btn btn-outline-success btn-sm" type="submit"
                                        name="addCustomerInvoice" value="SAVE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of form invoice content -->

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
    </script>

</body>

</html>