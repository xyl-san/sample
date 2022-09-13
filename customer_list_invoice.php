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
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="" type="button" class="btn btn-success btn-sm btn-flat mt-2">Save</a>
                    <a href="" type="button" class="btn btn-outline-secondary btn-sm btn-flat mt-2">Discard</a>
                </div>
            </div><br>
            <div>
                <a href="" type="button" class="btn btn-success btn-sm btn-flat mt-2">Confirm</a>
                <a href="" class="btn btn-outline-secondary btn-sm btn-flat mt-2">Preview</a>
            </div><br>
            <div class="card" style="width:50rem;">
                <div class="card-body">
                    <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-text">Customer Invoice Number</span>
                                <input type="text" id="customerInvoiceNumber" aria-label=""
                                    class="form-control text-uppercase" placeholder="CSTM-2022-0012">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-control" name="customer" aria-label="Select customer" id="customer">
                                <option value="" class="customer" selected></option>
                                <?php customerInvoice();?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <!-- style=" position: absolute; bottom: 20px; right: 210px;" -->
                            <a type="button" data-bs-target="#newFiscal" data-bs-toggle="modal" id="transferInput"><i
                                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                        <div class="col-md-5">
                            <label for="invoiceDate" class="form-label">Invoice Date</label>
                            <input type="date" class="form-control" id="invoiceDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="paymentReference" class="form-label">Payment Reference</label>
                            <input type="text" class="form-control" id="paymentReference" required>
                        </div>
                        <div class="col-md-3">
                            <label for="invoiceDate" class="form-label">Due Date</label>
                            <input type="dueDate" class="form-control" id="dueDate" required>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Terms</label>
                            <select class="form-control terms" name="terms" aria-label="Select taxType" id="taxType">
                                <option value="15 Days" class="terms" selected>15 Days</option>
                                <option value="21 Days" class="terms" selected>21 Days</option>
                                <option value="30 Days" class="terms" selected>30 Days</option>
                                <option value="45 Days" class="terms" selected>45 Days</option>
                                <option value="1 Month" class="terms" selected>1 Month</option>
                                <option value="2 Months" class="terms" selected>2 Months</option>
                                <option value="" class="terms" selected></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <!-- need to justify just figureout -->
                        </div>
                        <div class="col-md-3">
                            <label for="journal" class="form-label">Journal</label>
                            <input type="journal" class="form-control" id="journal" value="Customer Invoice">
                        </div>
                        <div class="col-md-2">
                            <!-- style=" position: absolute; bottom: 20px; right: 210px;" -->
                            <a type="button" data-bs-target="#newFiscal" data-bs-toggle="modal" id="transferInput"><i
                                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                        <div class="col-md-3">
                            <label for="invoiceDate" class="form-label">Currency</label>
                            <select class="form-control" name="customer" aria-label="Select customer" id="customer">
                                <option value="PHP" class="terms" selected>PHP</option>
                                <option value="USD" class="terms" selected>USD</option>
                                <option value="" class="customer" selected></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <a type="button" data-bs-target="#newFiscal" data-bs-toggle="modal" id="transferInput"><i
                                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
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

                                <form class="row g-3 form-contol" action="includes/queries.php" method="POST">
                                        <div class="col-md-3">
                                            <label for="exampleFormControlInput1" class="form-label">Customer
                                                Reference</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleFormControlInput1" class="form-label">Incoterm</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Salesperson</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
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
                                    </form>
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
                                                    <th>Debit</th>
                                                    <th>Credit</th>
                                                    <th>Tax Grids</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-outline-success  btn-sm"
                                            onClick="addJournalItemsRow();">Add Line</button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="otherInfo-tab-pane" role="tabpanel"
                                aria-labelledby="otherInfo-tab" tabindex="0">
                                <div class="row g-3 align-items-center">
                                    <div class="header">
                                        <span>Invoice</span>
                                        <span class="d-inline-end text-truncate" style="max-width: 150px;">Invoice</span>
                                       
                                    </div>
                                    <form class="row g-3" action="includes/queries.php" method="POST">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Customer
                                                Reference</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Incoterm</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Salesperson</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php';?>

</body>

</html>