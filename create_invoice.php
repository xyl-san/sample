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
            <div class="row">
                <div class="card" style="width:60rem;">
                    <div class="card-body">
                        <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <span class="input-group-text">Customer Invoice Number</span>
                                    <input type="text" name="invoiceCode" required
                                        class="form-control invoiceCode" placeholder="CINV-2022-0012">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="customer" class="form-label">Customer</label>
                                <select class="form-control" name="customer" aria-label="Select customer" id="customer" required>
                                    <option value="" class="customer" selected></option>
                                    <?php customerInvoice();?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="invoiceDate" class="form-label invoiceDate">Invoice Date</label>
                                <input type="date" class="form-control invoiceDate" id="invoiceDate" name="invoiceDate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="paymentReference" class="form-label">Payment Reference</label>
                                <input type="text" class="form-control text-uppercase paymentReference"
                                    id="paymentReference" name="paymentReference" >
                            </div>
                            <div class="col-md-3">
                                <label for="dueDate" class="form-label">Due Date</label>
                                <input type="date" class="form-control dueDate" id="dueDate">
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
                                <select class="form-control" name="salesPerson" aria-label="Select salesPerson" required
                                    id="salesPerson">
                                    <option value="" class="salesPerson" selected></option>
                                    <?php salesPerson();?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="journal" class="form-label">Journal</label>
                                <input type="journal" class="form-control" id="journal" value="Customer Invoice">
                            </div>
                            <div class="col-md-3">
                                <label for="invoiceDate" class="form-label">Currency</label>
                                <select class="form-control currencyType" name="currency" aria-label="Select customer"id="currencyType" required>
                                    <option value="PHP" class="currencyType" selected>PHP</option>
                                    <option value="USD" class="currencyType" selected>USD</option>
                                    <option value="" class="currencyType" selected></option>
                                </select>
                            </div>
                            <div class="col m-3" style="width:90%">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="invoiceLines-tab" data-bs-toggle="tab"
                                            data-bs-target="#invoiceLines-tab-pane" type="button" role="tab"
                                            aria-controls="invoiceLines-tab-pane" aria-selected="true">Invoice
                                            Lines</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="journalItems-tab" data-bs-toggle="tab"
                                            data-bs-target="#journalItems-tab-pane" type="button" role="tab"
                                            aria-controls="journalItems-tab-pane" aria-selected="false">Journal
                                            Items</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="otherInfo-tab" data-bs-toggle="tab"
                                            data-bs-target="#otherInfo-tab-pane" type="button" role="tab"
                                            aria-controls="otherInfo-tab-pane" aria-selected="false">Other Info</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="invoiceLines-tab-pane" role="tabpanel"
                                        aria-labelledby="invoiceLines-tab" tabindex="0">

                                        <div class="row g-3 align-items-center">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Label</th>
                                                        <th>Account</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Taxes</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><select class="form-control" name="product" id="product" required>
                                                                <option value="" class="product" selected></option>
                                                                <?php productInvoice();?>
                                                            </select></td>
                                                        <td><select class="form-control" name="label" id="label" required>
                                                                <option value="" class="label" selected></option>
                                                                <?php productDescriptionInvoice();?>
                                                            </select></td>
                                                        <td><select class="form-control" name="account" id="account" required>
                                                                <option value="" class="account" selected></option>
                                                                <?php accountListSelection();?>
                                                            </select></td>
                                                        <td><input class="form-control" type="number" name="quantity"
                                                                id="quantity" oninput="invoice()">
                                                        </td>
                                                        <td><input class="form-control" type="number" name="price"
                                                                id="price" oninput="invoice()">
                                                        </td>
                                                        <td><input class="form-control" type="number" name="taxes"
                                                                id="taxes" oninput="invoice()" readonly>
                                                        </td>
                                                        <td><input class="form-control" type="number" name="subtotal"
                                                                id="subtotal" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row justify-content-end">
                                                <div class="col-md-3">
                                                    <label for="total_amount" class="form-label">Total Amount</label>
                                                    <input type="number" class="form-control total_amount"
                                                        name="total_amount" id="total_amount" readonly>
                                                </div>
                                            </div>
                                            <div class="row justify-content-start">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control border-0 invoiceNotes"
                                                        name="invoiceNotes" id="invoiceNotes" placeholder="Add notes">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="journalItems-tab-pane" role="tabpanel"
                                        aria-labelledby="journalItems-tab" tabindex="0">
                                        <div class="col-md-12 form-floating">
                                            <div id="containerTable">
                                                <table class="table" id="journalItemsTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Account</th>
                                                            <th>Label</th>
                                                            <th>Due Date</th>
                                                            <th>Terms</th>
                                                            <th>Amount in Currency</th>
                                                            <th>Taxes</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php journalItemsTable();?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="otherInfo-tab-pane" role="tabpanel"
                                        aria-labelledby="otherInfo-tab" tabindex="0">
                                        <div class="row g-3 align-items-center">
                                            <div class="header">
                                                <span>Invoice</span>
                                                <span class="d-inline-end text-truncate"
                                                    style="max-width: 150px;">Invoice</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1" class="form-label">Customer
                                                    Reference</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">Incoterm</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">Salesperson</label>
                                                <input value="" type="email" class="form-control"
                                                    id="exampleFormControlInput1">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1" class="form-label">Fiscal
                                                    Position</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1" class="form-label">Recipient
                                                    Bank</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="form-check col-md-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Post Automatically
                                                </label>
                                            </div>
                                            <div class="form-check col-md-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    To Check
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input class="btn btn-outline-success btn-sm" type="submit" name="addCustomerInvoice"
                                    value="SAVE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php';?>

</body>

</html>