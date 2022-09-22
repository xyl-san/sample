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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="card" style="width:50%">
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="accountStatus" aria-label="Select account"
                            id="accountStatusOptions">
                            <option value="Sales" class="Status">Sales</option>
                            <option value="Purchase" class="Status">Purchase</option>
                            <option value="Cash" class="Status">Cash</option>
                            <option value="Bank" class="Status">Bank</option>
                            <option value="Miscellaneous" class="Status">Miscellaneous</option>
                        </select>
                        <label for="Journal ">Type</label>
                    </div>

                    <div id="miscellaneousNavTab" style="display: none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="journal-tab" data-bs-toggle="tab"
                                        data-bs-target="#journalEntryId" type="button" role="tab"
                                        aria-controls="journalEntryId" aria-selected="true">Journal Entries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="advanceSetting-tab" data-bs-toggle="tab"
                                        data-bs-target="#advanceSetting" type="button" role="tab"
                                        aria-controls="advanceSetting" aria-selected="false">Advance Setting</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="journalEntryId" role="tabpanel"
                                    aria-labelledby="journal-tab">
                                    <div>
                                        <div>
                                            <p6>
                                                Accounting information
                                            </p6>
                                        </div><br>
                                        <div class="col-md-12 form-floating">
                                            <input type="text" class="form-control text-uppercase shortCode"
                                                name="shortCode">
                                            <label for="shortCode">Short Code</label>
                                        </div><br>

                                        <div class="col-md-12 ">
                                            <label for="Journal">Currency</label>
                                            <div class="input-group">
                                                <select class="form-control currency" name="currency"
                                                    aria-label="Select account" id="currencySource">
                                                    <option value="PHP" class="currencyId" selected>PHP</option>
                                                    <option value="USD" class="currencyId">USD</option>
                                                </select>
                                                <a type="button"
                                                    class="btn btn-outline-secondary input-group-text text-hover"
                                                    title="Open Currency" data-bs-target="#currency"
                                                    data-bs-toggle="modal" id="currencyInternalLink">
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="advanceSetting" role="tabpanel"
                                    aria-labelledby="advanceSetting-tab">
                                    <div>
                                        <div>
                                            <p5>
                                                Control-Access
                                            </p5>
                                        </div><br>
                                        <p6 class="opacity-50">
                                            Keep empty for no control
                                        </p6>
                                        <div class="col-md-12 form-floating">
                                            <select class="form-control" name="allowedAccountType"
                                                aria-label="Select account" id="allowedAccountType">
                                                <option value="0" class="allowedAccountType" selected></option>
                                                <option value="" class="allowedAccountType text-primary">Search More...
                                                </option>
                                                <?php allowedAccountType();?>
                                            </select>
                                            <label for="allowedAccount">Allowed account types</label>
                                        </div><br>

                                        <div class="col-md-12 form-floating">
                                            <select class="form-control" name="allowedAccount"
                                                aria-label="Select account" id="allowedAccount">
                                                <option value="0" class="allowedAccount" selected></option>
                                                <option value="" class="allowedAccount text-success">Create New...
                                                </option>
                                                <?php allowedAccount();?>
                                            </select>
                                            <label for="accountDebit">Allowed account</label>
                                        </div><br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkBoxEntry">
                                            <label class="form-check-label" for="checkBoxEntry">
                                                Lock Posted Entries with Hash
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div>

                    <div id="bankNavTab" style="display: none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="journal-tab" data-bs-toggle="tab"
                                        data-bs-target="#journalEntryId" type="button" role="tab"
                                        aria-controls="journalEntryId" aria-selected="true"> Journal Entries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="incomingPayments-tab" data-bs-toggle="tab"
                                        data-bs-target="#incomingPayments" type="button" role="tab"
                                        aria-controls="incomingPayments" aria-selected="false"> Incoming Payments
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="outgoingPayments-tab" data-bs-toggle="tab"
                                        data-bs-target="#outgoingPayments" type="button" role="tab"
                                        aria-controls="outgoingPayments" aria-selected="false"> Outgoing Payments
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="advancedSetting-tab" data-bs-toggle="tab"
                                        data-bs-target="#advancedSetting" type="button" role="tab"
                                        aria-controls="advancedSetting" aria-selected="false"> Advanced
                                        Settings</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="journalEntryId" role="tabpanel"
                                    aria-labelledby="journal-tab">
                                    <div>
                                        <h6>Accounting information</h6>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control  bankAccount" name="bankAccount">
                                        <label for="bankAccount">Bank Account</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Journal">Suspense Account</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control suspenseAccount"
                                                name="suspenseAccount">
                                            <a type="button"
                                                class="btn btn-outline-secondary input-group-text text-hover"
                                                title="Open Suspense Account" data-bs-target="#" data-bs-toggle="modal"
                                                id="currencyInternalLink">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control  profitAccount" name="profitAccount">
                                        <label for="profitAccount">Profit Account</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control lossAccount" name="lossAccount">
                                        <label for="lossAccount">Loss Account</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control text-uppercase shortCode"
                                            name="shortCode">
                                        <label for="shortCode">Short Code</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control  currency" name="currency">
                                        <label for="currency">Short Code</label>
                                    </div>

                                    <div class="tab-pane fade" id="incomingPayments" role="tabpanel"
                                        aria-labelledby="incomingPayments-tab">
                                        <div>
                                            <h6>Start Here</h6>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="outgoingPayments" role="tabpanel"
                                        aria-labelledby="outgoingPayments-tab">
                                        <div>
                                            <h6>Start Here</h6>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="advancedSetting" role="tabpanel"
                                        aria-labelledby="advancedSetting-tab">
                                        <div>
                                            <h6>Start Here</h6>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>
    <?php include 'modals.php';?>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    $('select[name=things]').change(function() {
        if ($(this).val() == '') {
            window.location.href = 'invoices.php';
        }
    });


    $('#accountStatusOptions').on('change', function() {
        if ($(this).val() === "Miscellaneous") {
            $("#miscellaneousNavTab").show()
        } else {
            $("#miscellaneousNavTab").hide();
        }
    });
    $('#accountStatusOptions').on('change', function() {
        if ($(this).val() === "Bank") {
            $("#bankNavTab").show()
        } else {
            $("#bankNavTab").hide();
        }
    });
    </script>
</body>

</html>