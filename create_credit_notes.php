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
                        <h1 style="text-align:center;">Credit Note</h1>

                        <button><span>
                                <i class="fa-solid fa-file-signature"></i>
                                Create Receipt
                            </span></button>


                    </div>
                </div>
            </div>
            <!-- start of form credit content -->
            <div class="content">
                <div class="row">
                    <div class="card bg-warning text-dark bg-opacity-10">
                        <div class="card-body">
                            <form class="row g-3" action="includes/sample.php" method="POST" autocomplete="off"
                                id="create_credit">

                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text creditId" name="cus_credit_id">Customer
                                            Credit Note Number</span>
                                        <input type="text" class="form-control creditId text-dark" name="credit_id" readonly
                                            value="CRN-<?php echo (new DateTime())->format('mY'); ?>-00<?php creditNoteCode();?>" style="--bs-text-opacity: .5;">
                                    </div>
                                </div>
                                <div class="col-md-6 border form-group shadow p-0 mb-6 bg-body rounded">
                                    <div class="bg-warning" style="--bs-bg-opacity: .25;">
                                        <h5 class="p-2"> Customer Information </h5>
                                        <button
                                            class="mb-2 ms-2 btn btn-default text-white bg-success bg-gradient btn-flat btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#selectCustomer" id="add_to_list"
                                            type="button"><i class="fa fa-plus"></i> Select Existing
                                            Customer</button>
                                    </div>
                                    <div class="row form-floating p-2">
                                        <div class="col-6 py-1">
                                            <input type="text" class="form-control customerName" name="customer_name"
                                                id="customer_name" placeholder="Customer Name" required>
                                        </div>
                                        <div class=" col-6 py-1">
                                            <input type="number" class="form-control customerContact"
                                                name="customer_contact" id="customer_phone" placeholder="Contact Number"
                                                required>
                                        </div>
                                        <div class=" col-6 py-1">
                                            <input type="text" class="form-control customerAddress" name="address"
                                                id="customer_address_1" placeholder="Address" required>
                                        </div>
                                        <div class=" col-6 py-1">
                                            <input type="email" class="form-control customerEmail" id="customer_email"
                                                name="customer_email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mx-1 p-2 form-control shadow p-0 mb-6 bg-body rounded">
                                        <div class="col">
                                            <div class="row align-items-start">
                                                <div class="col input-group mb-3">

                                                    <span class="input-group-text dueDate" id="basic-addon1">Invoice
                                                        Date</span>
                                                    <input type="date" class="form-control creditDate" id="credit_date"
                                                        name="credit_date" required
                                                        value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Payment
                                                            Reference</span>
                                                        <input type="text"
                                                            class="form-control text-uppercase creditPaymentReference"
                                                            id="creditPaymentReference" name="credit_payment_reference">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-start">
                                                <div class="col input-group mb-3">

                                                    <span class="input-group-text dueDate" id="basic-addon1">Due
                                                        Date</span>
                                                    <input type="date" class="form-control creditDueDate" name="credit_duedate"
                                                        id="due_date" aria-label="Username"
                                                        aria-describedby="basic-addon1">
                                                </div>

                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">OR</span>
                                                        <select class="form-control creditTerms" name="credit_terms"
                                                            aria-label="Select termsType" id="termsType">
                                                            <option value="15 Days" class="terms">15 Days</option>
                                                            <option value="30 Days" class="terms">30 Days</option>
                                                            <option value="60 Days" class="terms">60 Days</option>
                                                            <option value="90 Days" class="terms">90 Days</option>
                                                            <option value="0" class="terms" selected>Terms</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Journal</span>
                                                    <input type="journal" class="form-control creditJournal" name="credit_journal"
                                                        id="journal" value="Customer Invoice">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 p-2 shadow p-0 mb-6 bg-body rounded">
                                    <div class="row col-12">
                                        <div class="col-6">
                                            <button
                                                class="mb-2 btn btn-default text-white bg-success bg-gradient btn-flat btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#selectSalesPerson"
                                                id="add_to_list" type="button"><i class="fa fa-plus"></i> Select
                                                Employee
                                            </button>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Sales Person</span>
                                                <input type="text" class="form-control creditSalesPerson" id="salesPerson"
                                                    name="credit_sales_person">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <hr style="height:7px; visibility:hidden;" />
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Currency</span>
                                                <select class="form-control currencyType" name="credit_currency"
                                                    aria-label="Select customer" id="currencyType" required>
                                                    <option value="PHP" class="creditCurrencyType" selected>PHP</option>
                                                    <option value="USD" class="currencyType">USD</option>
                                                    <option value="" class="currencyType"></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                                            <button type="button" class="btn btn-success btn-sm add-row-credit"><i
                                                    class="fa-regular fa-square-plus  "></i> Add Product</button>
                                        </div>

                                        <table class="table table-bordered table-hover table-striped" id="credit_table">
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
                                                            class="btn btn-sm btn-danger delete-row-credit"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-10">
                                                        <select class="form-control form-group-sm credit_product"
                                                            name="credit_product[]" required>
                                                            <option value="" class="credit_product " selected>
                                                            </option>
                                                            <?php productInvoices();?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <select class="form-control label" name="label[]" required>
                                                        <option value="" class="label" selected>
                                                        </option>
                                                        <?php productDescriptionInvoice();?>
                                                    </select>

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <select class="form-control account" name="account[]" required>
                                                        <option value="" class="account" selected>
                                                        </option>
                                                        <?php accountListInvoice();?>
                                                    </select>

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm no-margin-bottom">
                                                    <input type="number"
                                                        class="form-control credit_product_qty calculate"
                                                        name="credit_product_qty[]" value="1">

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
                                                                class="form-control calculate credit_product_price required"
                                                                name="credit_product_price[]"
                                                                aria-describedby="sizing-addon1" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="text-right">
                                                <div class="form-group form-group-sm  no-margin-bottom">
                                                    <input type="text" class="form-control calculate"
                                                        name="credit_product_discount[]" placeholder="% or Amount">
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
                                                                name="credit_product_sub[]" value="0.00"
                                                                aria-describedby="sizing-addon1" readonly>
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
                                        <div class="row form-control py-2 bg-warning p-2 text-dark bg-opacity-10">
                                            <div class="">
                                                <div>
                                                    <strong>Sub Total</strong><br>
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="credit-sub-total">0.00</span>
                                                    <input type="hidden" class="creditSubTotal" name="subtotal"
                                                        id="credit_subtotal">
                                                </div>
                                            </div>
                                            <div class="">
                                                <div>
                                                    <strong>Discount:</strong>
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="credit-discount">0.00</span>
                                                    <input type="hidden" class="creditDiscount" name="discount"
                                                        id="credit_discount">
                                                </div>
                                            </div>

                                            <div class="">
                                                <?php if (ENABLE_VAT == true) { ?>
                                                <div>
                                                    <strong> TAX/VAT:</strong><br>
                                                    <input type="checkbox" class="remove_vat"> Remove TAX/VAT
                                                </div>
                                                <div class="form-control">
                                                    <?php echo CURRENCY ?>: <span class="credit-vat"
                                                        data-enable-vat="<?php echo ENABLE_VAT ?>"
                                                        data-vat-rate="<?php echo VAT_RATE ?>"
                                                        data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
                                                    <input type="hidden" name="credit_vat" id="credit_vat">
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
                                            <div
                                                class="row form-control p-3 bg-dark bg-gradient text-white bg-opacity-50">
                                                <div class="">
                                                    <strong>Total</strong>
                                                </div>
                                                <div class="form-control py-2">
                                                    <?php echo CURRENCY ?>: <span class="credit-total">0.00</span>
                                                    <input class=" grandTotal" type="hidden" name="grandtotal"
                                                        id="credit_total">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row justify-content-evenly">
                                        <div class="col-8">
                                            <div class="row">

                                                <input type="text" class="form-control notes" name="notes" id="notes"
                                                    placeholder="Terms and Conditions">
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
                            <input class="btn adchor bg-success bg-gradient text-white " id="action_create_credit"
                                type="submit" name="createNewCustomerCredit" value="CREATE CREDIT">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of form credit content -->
    </div>



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
            $('#deleteCredit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editCredit').modal('show');
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
    <!-- credit note function for dynamic inputfields -->
<script type="text/javascript">
$(document).ready(function() {


});
// remove product row
$('#credit_table').on('click', ".delete-row-credit", function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    creditCalculateTotal();
});

// add new product row on credit note
var cloned = $('#credit_table tr:last').clone();
$(".add-row-credit").click(function(e) {
    e.preventDefault();
    cloned.clone().appendTo('#credit_table');
});
//calculations of data
creditCalculateTotal();

$('#credit_table').on('input', '.calculate', function() {
    creditUupdateTotals(this);
    creditCalculateTotal();
});

$('#credit_totals').on('input', '.calculate', function() {
    creditCalculateTotal();
});

$('#credit_product').on('input', '.calculate', function() {
    creditCalculateTotal();
});

$('.remove_vat').on('change', function() {
    creditCalculateTotal();
});

function creditUupdateTotals(elem) {

    var tr = $(elem).closest('tr'),
        quantity = $('[name="credit_product_qty[]"]', tr).val(),
        price = $('[name="credit_product_price[]"]', tr).val(),
        isPercent = $('[name="credit_product_discount[]"]', tr).val().indexOf('%') > -1,
        percent = $.trim($('[name="credit_product_discount[]"]', tr).val().replace('%', '')),
        subtotal = parseInt(quantity) * parseFloat(price);

    if (percent && $.isNumeric(percent) && percent !== 0) {
        if (isPercent) {
            subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
        } else {
            subtotal = subtotal - parseFloat(percent);
        }
    } else {
        $('[name="credit_product_discount[]"]', tr).val('');
    }
    if (subtotal < 0) {
        subtotal = 0;
    }
    $('.calculate-sub', tr).val(subtotal.toFixed(2));
}

function creditCalculateTotal() {

    var grandTotal = 0,
        disc = 0,
        c_ship = parseInt($('.calculate.shipping').val()) || 0;

    $('#credit_table tbody tr').each(function() {
        var c_sbt = $('.calculate-sub', this).val(),
            quantity = $('[name="credit_product_qty[]"]', this).val(),
            price = $('[name="credit_product_price[]"]', this).val() || 0,
            subtotal = parseInt(quantity) * parseFloat(price);

        grandTotal += parseFloat(c_sbt);
        disc += subtotal - parseFloat(c_sbt);

    });

    // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
    var subT = parseFloat(grandTotal),
        finalTotal = parseFloat(grandTotal + c_ship),
        vat = parseInt($('.credit-vat').attr('data-vat-rate'));

    $('.credit-sub-total').text(subT.toFixed(2));
    $('#credit_subtotal').val(subT.toFixed(2));
    $('.credit-discount').text(disc.toFixed(2));
    $('#credit_discount').val(disc.toFixed(2));

    if ($('.credit-vat').attr('data-enable-vat') === '1') {

        if ($('.credit-vat').attr('data-vat-method') === '1') {
            $('.credit-vat').text(((vat / 100) * finalTotal).toFixed(2));
            $('#credit_vat').val(((vat / 100) * finalTotal).toFixed(2));
            $('.credit-total').text((finalTotal).toFixed(2));
            $('#credit_total').val((finalTotal).toFixed(2));
        } else {
            $('.credit-vat').text(((vat / 100) * finalTotal).toFixed(2));
            $('#credit_vat').val(((vat / 100) * finalTotal).toFixed(2));
            $('.credit-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
            $('#credit_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
        }
    } else {
        $('.credit-total').text((finalTotal).toFixed(2));
        $('#credit_total').val((finalTotal).toFixed(2));
    }

    // remove vat
    if ($('input.remove_vat').is(':checked')) {
        $('.credit-vat').text("0.00");
        $('#credit_vat').val("0.00");
        $('.credit-total').text((finalTotal).toFixed(2));
        $('#credit_total').val((finalTotal).toFixed(2));
    }

}
</script>

<!--end credit note function for dynamic inputfields -->

</body>

</html>