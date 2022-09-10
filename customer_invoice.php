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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

</head>

<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <div>
                <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i>
                    Save</button>
                <button type="button" class="btn btn-sm"> Discard</button>
            </div><br>
            <div class="d-flex  highlight bg-light ps-3 pe-2 py-1">
                <div>
                    <ul class="nav">
                        <li class="nav-item">
                            <button type="button" class="btn btn-success btn-sm">
                                Confirm</button>
                            <button type="button" class="btn btn-sm">
                                Preview</button>
                        </li>
                    </ul>
                </div>
            </div><br>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="customerInvoices" class="col-sm-2 col-form-label">Customer
                                        Invoices</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <form class="row g-3">
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control " name="" required>
                                        <label for="">Customer</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="date" class="form-control " name="" required>
                                        <label for="">Invoice Date</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control " name="" required>
                                        <label for="due_date">Payment Reference</label>
                                    </div>
                                    <div class="col-md-3 form-floating">
                                        <input type="date" class="form-control " name="" required>
                                        <label for="due_date">Due Date</label>
                                    </div>
                                    <div class="col-md-3 form-floating">
                                        <select class="form-control" name="accountStatus" aria-label="Select account"
                                            id="accountStatus">
                                            <option value="Immediate Payment" class="Status" selected>Immediate Payment
                                            </option>
                                            <option value="15 Days" class="Status" selected>15 Days</option>
                                            <option value="21 Days" class="Status" selected>21 Days</option>
                                            <option value="30 Days" class="Status" selected>30 Days</option>
                                            <option value="45 Day" class="Status" selected>45 Days</option>
                                            <option value="1 Month" class="Status" selected>1 Month</option>
                                            <option value="2 Months" class="Status" selected>2 Months</option>
                                            <option value="End of Following Month" class="Status" selected>End of
                                                Following
                                                Month</option>
                                            <option value="" class="Status" selected></option>
                                        </select>
                                        <label for="account">Terms</label>
                                    </div>

                                    <div class="m-4">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active">
                                                <a href="#invoiceLine" class="nav-link show active"
                                                    data-bs-toggle="tab">Invoice Lines</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#journalItem" class="nav-link" data-bs-toggle="tab">Journal
                                                    Items</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#otherInfo" class="nav-link" data-bs-toggle="tab">Other
                                                    Info</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="invoiceLine">
                                                <div class="">
                                                    <p>ako</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="journalItem">
                                                <p>lang</p>
                                            </div>
                                            <div class="tab-pane fade" id="otherInfo">
                                                <p>to</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $("#myTab li:eq(1) a").tab("show");
});
</script>