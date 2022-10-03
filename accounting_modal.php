<!-- edit customer invoice  -->
<div class="modal fade" id="editInvoice" tabindex="-1" role="dialog" aria-labelledby="customerInvoiceTitle"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="customerInvoiceTitle">Edit Customer Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="invoiceId" name="invoice_id">
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text">Customer Invoice Number</span>
                            <input type="text" name="invoice_code" class="form-control invoiceCode"
                                placeholder="CINV-2022-0012">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="customer" class="form-label">Customer</label>
                        <select class="form-control" name="customer_id" aria-label="Select customerInvoice">
                            <option value="" class="customerId" selected></option>
                            <?php customerInvoice();?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="invoiceDate" class="form-label">Invoice Date</label>
                        <input type="date" class="form-control invoiceDate" name="invoice_date">
                    </div>
                    <div class="col-md-6">
                        <label for="paymentReference" class="form-label">Payment Reference</label>
                        <input type="text" class="form-control paymentReference" name="payment_reference">
                    </div>
                    <div class="col-md-3">
                        <label for="dueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control dueDate" name="due_date">
                    </div>
                    <div class="col-md-1">
                        <h4 class="text-center" style="line-height:4;">or</h4>
                    </div>
                    <div class="col-md-2">
                        <label for="status" class="form-label">Terms</label>
                        <select class="form-control terms" name="terms" aria-label="Select terms">
                            <option value="15 Days" class="termsType" selected>15 Days</option>
                            <option value="21 Days" class="termsType">21 Days</option>
                            <option value="30 Days" class="termsType">30 Days</option>
                            <option value="45 Days" class="termsType">45 Days</option>
                            <option value="1 Month" class="termsType">1 Month</option>
                            <option value="2 Months" class="termsType">2 Months</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="salesPerson" class="form-label">Sales Person</label>
                        <select class="form-control" name="employee_id" aria-label="Select">
                            <option value="" class="employeeId" selected></option>
                            <?php salesPerson();?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="journal" class="form-label">Journal</label>
                        <input type="journal" class="form-control" value="Customer Invoice">
                    </div>
                    <div class="col-md-3">
                        <label for="currency" class="form-label">Currency</label>
                        <select class="form-control currency" name="currency">
                            <option value="PHP" class="currencyType" selected>PHP</option>
                            <option value="USD" class="currencyType">USD</option>
                        </select>
                    </div>

                    <div class="col m-3" style="width:90%">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="invoiceLines-tab" data-bs-toggle="tab"
                                    data-bs-target="#invoiceLines-tab-pane" type="button" role="tab"
                                    aria-controls="invoiceLines-tab-pane" aria-selected="true">Invoice
                                    Lines
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="journalItems-tab" data-bs-toggle="tab"
                                    data-bs-target="#journalItems-tab-pane" type="button" role="tab"
                                    aria-controls="journalItems-tab-pane" aria-selected="false">Journal
                                    Items
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="otherInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#otherInfo-tab-pane" type="button" role="tab"
                                    aria-controls="otherInfo-tab-pane" aria-selected="false">Other
                                    Info
                                </button>
                            </li>
                        </ul>
                    </div>
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
                                            <td><select class="form-control" id="product">
                                                    <option value="" class="productId" name="product_id" selected>
                                                    </option>
                                                    <?php productInvoice();?>
                                                </select></td>
                                            <td><select class="form-control" name="label">
                                                    <option value="" class="label" selected>
                                                    </option>
                                                    <?php productDescriptionInvoice();?>
                                                </select></td>
                                            <td><select class="form-control" name="account_id">
                                                    <option value="" class="accountId" selected>
                                                    </option>
                                                    <?php accountListSelection();?>
                                                </select></td>
                                            <td><input class="form-control" type="number" name="quantity" id="quantity"
                                                    oninput="invoice()">
                                            </td>
                                            <td><input class="form-control price" type="number" name="price"
                                                    oninput="invoice()">
                                            </td>
                                            <td><input class="form-control taxes" type="number" name="taxes"
                                                    oninput="invoice()" readonly>
                                            </td>
                                            <td><input class="form-control subtotal" type="number" name="subtotal"
                                                    readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <label for="total_amount" class="form-label">Total
                                            Amount</label>
                                        <input type="number" class="form-control total_amount" name="total_amount"
                                            id="total_amount">
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control border-0 invoiceNotes"
                                            name="invoice_notes" placeholder="Add notes">
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
                                                <?php ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="otherInfo-tab-pane" role="tabpanel"
                                aria-labelledby="otherInfo-tab" tabindex="0">
                                <div class="row g-3 align-items-center">
                                    <div class="mx-auto" style="width: 200px;">
                                        Invoices
                                    </div>
                                    <div class="mx-auto" style="width: 400px;">
                                        Accounting
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Customer
                                            Reference</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Incoterm</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="salesPersonInvoice" class="form-label">Salesperson</label>
                                        <input value="" type="text" class="form-control salesPersonInvoiceOtherInfo">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Fiscal
                                            Position</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Recipient
                                            Bank</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Post Automatically
                                        </label>
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            To Check
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end customer invoice  -->

<!--start delete customer invoice  -->
<div class="modal fade" id="deleteInvoice" tabindex="-1" role="dialog" aria-labelledby="invoiceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="invoice_id" name="invoiceId">
                    <div class="text-center">
                        <p>
                            Delete customer invoice record?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-warning">Cancel</button>
                        <button type="submit" class="btn btn-danger float-end" name="deleteInvoice">Yes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!--end delete customer invoice  -->


<!-- start adding accounting periods  -->
<div class="modal fade" id="newConfigure" tabindex="-1" role="dialog" aria-labelledby="accountingPeriods"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="accountingPeriods">Accounting Periods</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off" required>
                    <div>
                        <h6>Fiscal Years</h6>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control openingDate" name="openingDate"
                            value="<?php echo date('Y-m-d');?>" required>
                        <label for="">Opening Date</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control fiscalYearEnd" name="fiscalYearEnd"
                            value="<?php echo date('Y-m-d', strtotime("+1 year"));?>">
                        <label for="fiscalYearEnd ">Fiscal Year End</label>
                    </div>
                    <div>
                        <h6>Tax Return</h6>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control periodicity" name="periodicity" aria-label="Select account"
                            id="journalId" required>
                            <option value="Annually" class="periodicityType">Annually</option>
                            <option value="Semi-Annually" class="periodicityType">Semi-Annually</option>
                            <option value="Quarterly" class="periodicityType">Quarterly</option>
                            <option value="Monthly" class="periodicityType" selected>Monthly</option>
                        </select>
                        <label for="Journal">Periodicity</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control reminder" name="reminder" required>
                        <label for="reminder">Reminder: Days after period</label>
                    </div>
                    <div class="col-md-12 ">

                        <!-- <label for="Journal">Journal</label>
                        <div class="input-group">
                            <select class="form-control journal" name="journal" aria-label="Select account"
                                id="journalSource" required>

                                <option value="Miscellaneous Operations" class="journalDescription" selected>
                                    Miscellaneous
                                    Operations</option>
                                <option value="Inventory Valuation" class="journalDescription">Inventory
                                    Valuation</option>
                                <option value="Exchange Difference" class="journalDescription">Exchange
                                    Difference </option>
                                <option value="Cash Basis Taxes" class="journalDescription">Cash Basis
                                    Taxes </option>
                                <option value="Point of Sale" class="journalDescription">Point of Sale</option>
                                <option value="">Create New</option>
                            </select>

                            <a type="button" class="btn btn-outline-secondary input-group-text text-hover"
                                title="Open Journal" data-bs-target="#newFiscal" data-bs-toggle="modal"
                                id="openJournalInternalLink">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>

                        </div> -->
                        <div class="input-group col-12 form-floating">
                            <select class="form-control journal" name="journal" id="journalSource"
                                aria-label="Select department" required>
                                <option value="" selected>- Select -</option>
                                <?php journalListEntry();?>
                            </select>
                            <a type="button" class="btn btn-outline-secondary input-group-text text-hover"
                                title="Open Journal" data-bs-target="#newFiscal" data-bs-toggle="modal"
                                id="openJournalInternalLink">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                            <label for="type">Journal</label>
                        </div>

                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-success float-end btn-sm"
                            name="addJournalEntries">Apply</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End adding accounting periods  -->

<!-- Start open journal modal  -->
<div class="modal fade" id="newFiscal" aria-hidden="true" aria-labelledby="newFiscal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="accountingPeriods">Open: Journal</h5>
                <a href="journal_entry.php"><button type="button" class="btn btn-outline-secondary"><i
                            class="fa-solid fa-book"></i>
                        Journal Entries</button></a>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">

                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control journalDestination" name="journalDestination"
                            id="journalDestination" readonly>
                        <label for="journalDestination">Journal Name</label>
                    </div>

                    <div class="col-md-6 form-group form-floating">
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

                    <!-- Miscellaneous navigation tab -->
                    <div id="miscellaneousNavTab" style="display: none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs show active" id="myTab" role="tablist">
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
                                    <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div>
                                                    <p6>
                                                        Accounting information
                                                    </p6>
                                                </div><br>
                                                <div class="col-md-6 form-floating px-2">
                                                    <input type="text" class="form-control text-uppercase shortCode"
                                                        name="shortCode" placeholder="Short Code">
                                                    <label for="shortCode">Short Code</label>
                                                </div><br>

                                                <div class="col-md-6 ">
                                                    <div class="input-group form-floating">
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
                                                        <label for="Journal">Currency</label>
                                                    </div>
                                                </div>
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
                                            <select class="form-control" id="allowedAccountType"
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
                            </div>
                        </div>
                    </div>
                    <!-- End Miscellaneous navigation tab -->
                    <!-- Bank navigation tab -->
                    <div id="bankNavTab" style="display: none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active btn" id="journalEntry-tabBank" data-bs-toggle="tab"
                                        data-bs-target="#journalEntry" type="button" role="tab"
                                        aria-controls="journalEntry" aria-selected="true"> Journal
                                        Entries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn" id="incomingPayments-tabBank" data-bs-toggle="tab"
                                        data-bs-target="#incomingPayments" type="button" role="tab"
                                        aria-controls="incomingPayments" aria-selected="false"> Incoming
                                        Payments
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn" id="outgoingPayments-tab" data-bs-toggle="tab"
                                        data-bs-target="#outgoingPayments" type="button" role="tab"
                                        aria-controls="outgoingPayments" aria-selected="false"> Outgoing
                                        Payments
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn" id="advancedSetting-tab" data-bs-toggle="tab"
                                        data-bs-target="#advancedSetting" type="button" role="tab"
                                        aria-controls="advancedSetting" aria-selected="false"> Advanced
                                        Settings</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="bankAccountingInformationContent">
                                <div class="tab-pane fade show active" id="journalEntry" role="tabpanel"
                                    aria-labelledby="journalEntry-tab">
                                    <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <div class="row">
                                                <h6 class="opacity-75">Accounting Information</h6>
                                                <div class="col-6 p-1 form-floating">
                                                    <input type="text" class="form-control bankAccount"
                                                        name="bankAccount" placeholder="Bank Account">
                                                    <label for="bankAccount">Bank Account</label>
                                                </div>
                                                <div class="col-6 p-1">
                                                    <div class="input-group form-floating">
                                                        <input type="text" class="form-control suspenseAccount"
                                                            name="suspenseAccount">
                                                        <a type="button"
                                                            class="btn btn-outline-secondary input-group-text text-hover"
                                                            title="Open Suspense Account" data-bs-target="#"
                                                            data-bs-toggle="modal" id="currencyInternalLink">
                                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                        </a>
                                                        <label for="Journal">Suspense Account</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 form-floating p-1">
                                                    <input type="text" class="form-control  profitAccount"
                                                        name="profitAccount">
                                                    <label for="profitAccount">Profit Account</label>
                                                </div>
                                                <div class="col-6 form-floating p-1">
                                                    <input type="text" class="form-control lossAccount"
                                                        name="lossAccount">
                                                    <label for="lossAccount">Loss Account</label>
                                                </div>
                                                <div class="col-6 form-floating p-1">
                                                    <input type="text" class="form-control text-uppercase shortCode"
                                                        name="shortCode">
                                                    <label for="shortCode">Short Code</label>
                                                </div>
                                                <div class="col-6 form-floating p-1">
                                                    <input type="text" class="form-control text-uppercase shortCode"
                                                        name="shortCode">
                                                    <label for="shortCode">Currency</label>
                                                </div>
                                                <h6 class="opacity-75">Bank Account Number</h6>
                                                <div class="col-12 form-floating p-1">
                                                    <input type="text" class="form-control  accountNumnber"
                                                        name="accountNumnber">
                                                    <label for="bankAccount">Account Number</label>
                                                </div>
                                                <h6 class="opacity-75">Bank Feeds</h6>
                                                <div class="form-group">
                                                    <div class="col-6">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Undefined Yet
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Import (CAMPT, CSV, OFX)
                                                        </label>
                                                    </div>
                                                    <div class=" col-6">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Automated Bank Synchronization
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="incomingPayments" role="tabpanel"
                                    aria-labelledby="incomingPayments-tab">
                                    <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <div class="row">
                                                <table id="table" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <h6 class="opacity-75">Payment Method</h6>
                                                            </th>
                                                            <th>
                                                                <h6 class="opacity-75">Name</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" class="form-control "></td>
                                                            <td><input type="text" class="form-control"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="outgoingPayments" role="tabpanel"
                                    aria-labelledby="outgoingPayments-tab">
                                    <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <div class="row">
                                                <table id="table" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <h6 class="opacity-75">Payment Method</h6>
                                                            </th>
                                                            <th>
                                                                <h6 class="opacity-75">Name</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" class="form-control "></td>
                                                            <td><input type="text" class="form-control"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="advancedSetting" role="tabpanel"
                                    aria-labelledby="advancedSetting-tab">
                                    <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div>
                                                    <p5>
                                                        Control-Access
                                                    </p5>
                                                </div><br>
                                                <p6 class="opacity-50">
                                                    Keep empty for no control
                                                </p6>
                                                <div class="col-md-12 form-floating p-1">
                                                    <select class="form-control" name="allowedAccountType"
                                                        aria-label="Select account" id="allowedAccountType">
                                                        <option value="0" class="allowedAccountType" selected>
                                                        </option>
                                                        <option value="" class="allowedAccountType text-primary">
                                                            Search More...
                                                        </option>
                                                        <?php allowedAccountType();?>
                                                    </select>
                                                    <label for="allowedAccount">Allowed account types</label>
                                                </div><br>

                                                <div class="col-md-12 form-floating p-1">
                                                    <select class="form-control" name="allowedAccount"
                                                        aria-label="Select account" id="allowedAccount">
                                                        <option value="0" class="allowedAccount" selected></option>
                                                        <option value="" class="allowedAccount text-success">Create
                                                            New...
                                                        </option>
                                                        <?php allowedAccount();?>
                                                    </select>
                                                    <label for="accountDebit">Allowed account</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <!-- End Bank navigation tab -->

                    <!-- Sales navigation tab -->
                    <div class="card" id="salesNavTab" style="border:none;" role="tabpanel"
                        aria-labelledby="journal-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="salesNavTabJournal" data-bs-toggle="tab"
                                    data-bs-target="#salesJournalEntry" type="button" role="tab"
                                    aria-controls="saleJournal-tab-pane" aria-selected="true">Journal Entries</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="salesNavTabAdvancedSetting" data-bs-toggle="tab"
                                    data-bs-target="#salesAdvancedSetting" type="button" role="tab"
                                    aria-selected="false">Advanced
                                    Setting</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="salesTabContent">
                            <div class="tab-pane fade show active py-2" id="salesJournalEntry" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <h6 class="opacity-75">Accounting Information</h6>
                                <div class="row g-4">

                                    <div class="col-6">
                                        <div class="input-group form-floating">
                                            <select class="form-control incomeDefault" name="defaulIncomeSales"
                                                aria-label="Select account" id="salesIncomeDefault">
                                                <option value="cashDifference" class="salesIncomeDefault" selected>
                                                    Cash
                                                    Difference Gain</option>
                                                <option value="foreignExchange" class="salesAccount">Foreign
                                                    Exchange
                                                    Gain
                                                </option>
                                            </select>
                                            <a type="button"
                                                class="btn btn-outline-secondary input-group-text text-hover"
                                                title="Extenal Link" data-bs-target="#defaulIncomeSales"
                                                data-bs-toggle="modal" id="currencyInternalLink">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                            <label for="Journal">Default Income Account</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkBoxEntry">
                                            <label class="form-check-label" for="checkBoxEntry">
                                                Dedicated Credit Note Sequence
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-uppercase shortCode"
                                                name="shortCode" placeholder="MISC">
                                            <label for="shortCode">Short Code</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <select class="form-control currencySales" name="currencySales"
                                                aria-label="Select account" id="currencySource">
                                                <option value="PHP" class="currencyId" selected>PHP</option>
                                                <option value="USD" class="currencyId">USD</option>
                                            </select>
                                            <label for="Journal">Currency</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- for advance setting tab -->
                            <div class="tab-pane fade" id="salesAdvancedSetting" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <div class="row g-4">
                                    <div class="col-6 py-2">
                                        <h6 class="opacity-75">Control Access</h6>
                                        <p6 class="opacity-50">
                                            Keep empty for no control
                                        </p6>
                                        <div class="col-md-12 form-floating">
                                            <select class="form-control" name="allowedAccountType"
                                                aria-label="Select account" id="allowedAccountType">
                                                <option value="0" class="allowedAccountType" selected>
                                                </option>
                                                <option value="" class="allowedAccountType text-primary">
                                                    Search More...
                                                </option>
                                                <?php allowedAccountType();?>
                                            </select>
                                            <label for="allowedAccount">Allowed account types</label>
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <h6 class="opacity-75 py-2">Create Invoices upon Emails</h6>
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-uppercase shortCode"
                                                name="shortCode" placeholder="E-mail">
                                            <label for="shortCode">Email Alias</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-floating">
                                            <select class="form-control" name="allowedAccount"
                                                aria-label="Select account" id="allowedAccount">
                                                <option value="0" class="allowedAccount" selected></option>
                                                <option value="" class="allowedAccount text-success">Create
                                                    New...
                                                </option>
                                                <?php allowedAccount();?>
                                            </select>
                                            <label for="accountDebit">Allowed account</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkBoxEntry">
                                                <label class="form-check-label" for="checkBoxEntry">
                                                    Lock Posted Entries with Hash
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 form-floating">

                                            <div class="form-check">
                                                <h6 class="opacity-75">Electronic Data Interchange</h6>
                                                <p6 class="opacity-50">
                                                    Electronic invoicing
                                                </p6>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkBoxEntry">
                                                <label class="form-check-label" for="checkBoxEntry">
                                                    Factur-X (FR)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="content col-6 form-floating">
                                                <h6 class="opacity-75 py-2">Payment Communications</h6>
                                                <div class="form-floating">
                                                    <select class="form-control incomeDefault" name="defaulIncomeSales"
                                                        aria-label="Select account" id="salesIncomeDefault">
                                                        <option value="cashDifference" class="salesPaymenOpen" selected>
                                                            Open</option>
                                                        <option value="cashDifference"
                                                            class="salesPaymentCustomer active" selected>Based on
                                                            Customer</option>
                                                        <option value="foreignExchange" class="salesPaymentInvoice">
                                                            Based on Invoice</option>
                                                    </select>

                                                    <label for="communicationType">Communication Type</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales navigation tab -->
                    <!-- Purchase navigation tab -->
                    <div id="purchaseNavTab" style="display:none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs show active" id="myPurchaseTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="purchaseNavTabJournal" data-bs-toggle="tab"
                                        data-bs-target="#purchaseJournalEntry" type="button" role="tab"
                                        aria-controls="purchaseJournal-tab-pane">Journal Entries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="purchaseNavTabAdvancedSetting" data-bs-toggle="tab"
                                        data-bs-target="#purchaseAdvancedSetting" type="button" role="tab">Advanced
                                        Setting</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="purchaseContent">
                                <div class="tab-pane fade show active py-2" id="purchaseJournalEntry" role="tabpanel"
                                    aria-labelledby="homePurchase-tab" tabindex="0">
                                    <h6 class="opacity-75">Accounting Information</h6>
                                    <div class="row g-4">

                                        <div class="col-6">
                                            <div class="input-group form-floating">
                                                <select class="form-control incomeDefault" name="defaulExpensePurchase"
                                                    aria-label="Select account" id="purchaseIncomeDefault">
                                                    <option value="cashDifference" class="purchaseExpenseDefault"
                                                        selected>
                                                        Cash
                                                        Difference Gain</option>
                                                    <option value="foreignExchange" class="purchaseAccount">Foreign
                                                        Exchange
                                                        Gain
                                                    </option>
                                                </select>
                                                <a type="button"
                                                    class="btn btn-outline-secondary input-group-text text-hover"
                                                    title="Extenal Link" data-bs-target="#defaulIncomeSales"
                                                    data-bs-toggle="modal" id="currencyInternalLink">
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                </a>
                                                <label for="Journal">Default Expenses Account</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkBoxEntry">
                                                <label class="form-check-label" for="checkBoxEntry">
                                                    Dedicated Credit Note Sequence
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating p-2">
                                                <input type="text" class="form-control text-uppercase shortCode"
                                                    name="shortCode" placeholder="MISC">
                                                <label for="shortCode">Short Code</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <select class="form-control currencyPurchase" name="currencyPurchase"
                                                    aria-label="Select account" id="currencySource">
                                                    <option value="PHP" class="currencyId" selected>PHP</option>
                                                    <option value="USD" class="currencyId">USD</option>
                                                </select>
                                                <label for="Journal">Currency</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- for advanced settings -->
                                <div class="tab-pane fade" id="purchaseAdvancedSetting" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="row g-4">
                                        <div class="col-6 py-2">
                                            <h6 class="opacity-75">Control Access</h6>
                                            <p6 class="opacity-50">
                                                Keep empty for no control
                                            </p6>
                                            <div class="col-md-12 form-floating">
                                                <select class="form-control" name="allowedAccountType"
                                                    aria-label="Select account" id="allowedAccountType">
                                                    <option value="0" class="allowedAccountType" selected>
                                                    </option>
                                                    <option value="" class="allowedAccountType text-primary">
                                                        Search More...
                                                    </option>
                                                    <?php allowedAccountType();?>
                                                </select>
                                                <label for="allowedAccount">Allowed account types</label>
                                            </div>
                                        </div>
                                        <div class="col-6 p-2">
                                            <h6 class="opacity-75 py-2">Create Invoices upon Emails</h6>
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-uppercase shortCode"
                                                    name="shortCode" placeholder="E-mail">
                                                <label for="shortCode">Email Alias</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-floating">
                                                <select class="form-control" name="allowedAccount"
                                                    aria-label="Select account" id="allowedAccount">
                                                    <option value="0" class="allowedAccount" selected></option>
                                                    <option value="" class="allowedAccount text-success">Create
                                                        New...
                                                    </option>
                                                    <?php allowedAccount();?>
                                                </select>
                                                <label for="accountDebit">Allowed account</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkBoxEntry">
                                                    <label class="form-check-label" for="checkBoxEntry">
                                                        Lock Posted Entries with Hash
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- End Purchase navigation tab -->
                    <!-- Cash navigation tab -->
                    <div id="cashNavTab" style="display:none;">
                        <div class="form-group">
                            <ul class="nav nav-tabs show active" id="myCashTab" role="tab-list">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="cashJournal-tab" data-bs-toggle="tab"
                                        data-bs-target="#cashJournalEntry" type="button" role="tab">Journal
                                        Entries</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cashIncoming-tab" data-bs-toggle="tab"
                                        data-bs-target="#cashIncoming" type="button" role="tab">Incoming
                                        Payments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="cashOutgoing-tab" data-bs-toggle="tab"
                                        data-bs-target="#cashOutgoing" type="button" role="tab">Outgoing
                                        Payments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cashAdvanceSetting-tab" data-bs-toggle="tab"
                                        data-bs-target="#cashAdvanceSetting" type="button" role="tab">Advance
                                        Setting</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Cash journal nav tab -->
                        <div class="tab-content" id="myCashTabContent">
                            <div class="tab-pane fade show active" id="cashJournalEntry" role="tabpanel"
                                aria-labelledby="cashjournal-tab">
                                <h6 class="opacity-75">Accounting Information</h6>
                                <div class="row g-4">
                                    <div class="col-6 p-1">
                                        <div class="input-group form-floating">
                                            <select class="form-control journalDefault" name="cashAccount"
                                                aria-label="Select account" id="cashAccount">
                                                <option value="cashBank" class="cashCashAccount" selected>
                                                    Bank</option>
                                                <option value="cashCash" class="purchaseAccount">Cash
                                                </option>
                                            </select>
                                            <a type="button"
                                                class="btn btn-outline-secondary input-group-text text-hover"
                                                title="Extenal Link" data-bs-target="#defaulIncomeSales"
                                                data-bs-toggle="modal" id="currencyInternalLink">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                            <label for="Journal">Cash Account</label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-floating p-1">
                                        <select class="form-control" name="allowedAccount" aria-label="Select account"
                                            id="allowedAccount">
                                            <option value="0" class="allowedAccount" selected></option>
                                            <option value="" class="allowedAccount text-success">Create New...
                                            </option>
                                            <?php allowedAccount();?>
                                        </select>
                                        <label for="accountDebit">Suspense Account</label>
                                    </div>
                                    <div class="col-6 form-floating p-1">
                                        <input type="text" class="form-control  profitAccount" name="profitAccount">
                                        <label for="profitAccount">Profit Account</label>
                                    </div>
                                    <div class="col-6 form-floating p-1">
                                        <input type="text" class="form-control lossAccount" name="lossAccount">
                                        <label for="lossAccount">Loss Account</label>
                                    </div>
                                    <div class="col-6 form-floating p-1">
                                        <div class="form-floating">
                                            <select class="form-control currencyPurchase" name="currencyPurchase"
                                                aria-label="Select account" id="currencySource">
                                                <option value="PHP" class="currencyId" selected>PHP</option>
                                                <option value="USD" class="currencyId">USD</option>
                                            </select>
                                            <label for="Journal">Currency</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Cash incoming nav tab -->
                            <div class="tab-pane fade" id="cashIncoming" role="tabpanel">
                                <div class="card" style="border:none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <table id="cashTable" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h6 class="opacity-75">Payment Method</h6>
                                                        </th>
                                                        <th>
                                                            <h6 class="opacity-75">Name</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control "></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Cash outgoing nav tab -->
                            <div class="tab-pane fade" id="cashOutgoing" role="tabpanel"
                                aria-labelledby="cashIncoming-tab">
                                <div class="card" style="border:none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <table id="table" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h6 class="opacity-75">Payment Method</h6>
                                                        </th>
                                                        <th>
                                                            <h6 class="opacity-75">Name</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control "></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- cash advanced setting nav tab -->
                            <div class="tab-pane fade" id="cashAdvanceSetting" role="tabpanel">
                                <div class="card" style="border:none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div>
                                                <p5>
                                                    Control-Access
                                                </p5>
                                            </div><br>
                                            <p6 class="opacity-50">
                                                Keep empty for no control
                                            </p6>
                                            <div class="col-md-12 form-floating p-1">
                                                <select class="form-control" name="allowedAccountType"
                                                    aria-label="Select account" id="allowedAccountType">
                                                    <option value="0" class="allowedAccountType" selected>
                                                    </option>
                                                    <option value="" class="allowedAccountType text-primary">
                                                        Search More...
                                                    </option>
                                                    <?php allowedAccountType();?>
                                                </select>
                                                <label for="allowedAccount">Allowed account types</label>
                                            </div><br>

                                            <div class="col-md-12 form-floating p-1">
                                                <select class="form-control" name="allowedAccount"
                                                    aria-label="Select account" id="allowedAccount">
                                                    <option value="0" class="allowedAccount" selected></option>
                                                    <option value="" class="allowedAccount text-success">Create
                                                        New...
                                                    </option>
                                                    <?php allowedAccount();?>
                                                </select>
                                                <label for="accountDebit">Allowed account</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cash navigation tab -->

                    <div class="mb-2">
                        <button type="button" data-bs-target="#newConfigure" data-bs-toggle="modal"
                            class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end btn-sm" name="">Save</button>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
<!-- End open journal modal  -->


<!-- Start open currency  -->
<div class="modal fade" id="currency" aria-hidden="true" aria-labelledby="currency" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="openCurrency">Open: Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control currencyType" name="currencyType"
                            id="currencyDestination" readonly>
                        <label for="currencyType">Currency</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control currencyUnit" name="currencyUnit">
                        <label for="currencyUnit">Currency Unit</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control countryCurrency" name="countryCurrency">
                        <label for="countryCurrency">Country Currency</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control currencySubunit" name="currencySubunit">
                        <label for="currencySubunit">Currency Subunit</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input activeSwitchBox" type="checkbox" role="switch"
                            id="activeSwitchBox" checked>
                        <label class="form-check-label" for="activeSwitchBox">Active
                            input</label>
                    </div>
                    <div>
                        <h6>Rates
                        </h6>
                    </div>
                    <div class="col-md-12 form-floating">
                        <div id="containerTable">
                            <div class="table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Unit per Currency</th>
                                            <th>Technical Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control date" type="date" name="date" id="date">
                                            </td>
                                            <td><input class="form-control unitPerCurrency" type="number"
                                                    name="unitPerCurrency">
                                            </td>
                                            <td><input class="form-control technicalRate" type="number"
                                                    name="technicalRate">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-target="#newFiscal" data-bs-toggle="modal"
                            class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End open currency  -->

<!-- start allowed account type list table -->
<div class="modal fade" id="allowedAccountsTypeTable" aria-hidden="true" aria-labelledby="createTaxesTitle"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createTaxesTitle">Search: Allowed Account types</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <div id="containerTable">
                            <table class="table" id="accountType">
                                <thead>
                                    <tr>
                                        <th>Account Type</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php accountListTypeTableInModal(); ?>
                                </tbody>
                            </table>
                            <div class="mb-2">
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-warning btn-sm float-end">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end allowed account type list table end -->

<!-- allowed account list table -->
<div class="modal fade" id="allowedAccountsTable" aria-hidden="true" aria-labelledby="createTaxesTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createTaxesTitle">Search: Allowed Accounts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <div id="containerTable">
                            <table class="table" id="example1">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Account Name</th>
                                        <th>Type</th>
                                        <th>Allowed Reconciliation</th>
                                        <th>Non Trade</th>
                                        <th>Default Taxes</th>
                                        <th>Tags</th>
                                        <th>Allowed Journal</th>
                                        <th>Account Currency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php accountListTableInModal(); ?>
                                </tbody>
                            </table>
                            <div class="mb-2">
                                <button type="button" data-bs-target="#createAccountList" data-bs-toggle="modal"
                                    class="btn btn-success btn-sm">Create New</button>
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-warning btn-sm float-end">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end allowed account list table end -->


<!-- creating account list  -->
<div class="modal fade" id="createAccountList" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="openCurrency">Create: Allowed Accounts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountCode" name="accountCode" required>
                        <label for="accountCode">Account Code</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountName" name="accountName" required>
                        <label for="accountName">Account Name</label>
                    </div>
                    <div>
                        <h6 class="opacity-75">Accounting</h6>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control type" name="type" required>
                        <label for="type">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control currency" name="currency" aria-label="Select account" id="currency">
                            <option value="PHP" class="currencyType" selected>PHP</option>
                            <option value="USD" class="currencyType">USD</option>
                        </select>
                        <label for="currency">Account Currency</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control defaultTaxes" name="defaultTaxes" required>
                        <label for="defaultTaxes">Default Taxes</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control tags" name="tags" required>
                        <label for="tags">Tags</label>
                    </div>
                    <div class="col-md-6 form-floating ">
                        <div class="form-check">
                            <input class="allowReconciliation" name="allowReconciliation" type="checkbox" value=""
                                id="allowReconciliation">
                            <label for="allowReconciliation">
                                Allow Reconciliation
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 form-floating ">
                        <div class="form-check">
                            <input class="deprecated" name="deprecated" type="checkbox" value="" id="deprecated">
                            <label for="deprecated">
                                Deprecated
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control allowedJournal" name="allowedJournal" required>
                        <label for="allowedJournal">Allowed Journals</label>
                    </div>
                    <div class="col-md-6">
                        <label for="tags">Group</label>
                    </div>

                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="createAccountList">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- end creating account list -->

<!-- add new journal entry -->
<div class="modal fade" id="newJournalEntry" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="journal_entries_id">Create: Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="datetime-local" class="form-control date" name="date" required>
                        <label for="accountCode">Date</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control journal_entries_code" name="journal_entries_code"
                            required>
                        <label for="accountName">Journal Code</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control partner" name="partner" required>
                        <label for="accountName">Partner</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control reference" name="reference" required>
                        <label for="type">Reference</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control journal" name="journal" aria-label="Select department" required>
                            <option value="" selected>- Select -</option>
                            <?php journalList();?>
                        </select>
                        <label for="type">Journal</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control type" name="type" aria-label="Select account" id="type">
                            <option value="0" class="type" selected>Debit</option>
                            <option value="1" class="type">Credit</option>
                        </select>
                        <label for="currency">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control total" name="total" required>
                        <label for="defaultTaxes">Total</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control status" name="status" aria-label="Select account" id="status">
                            <option value="1" class="status" selected>Active</option>
                            <option value="0" class="status">Inactive</option>
                        </select>
                        <label for="currency">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="createJournalEntry">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END ADD NEW journal entry -->
<!-- EDIT journal entry -->
<div class="modal fade" id="editJournalEntry" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="">Edit: Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="journal_entries_id" name="journal_entries_id">
                    <div class="col-md-6 form-floating">
                        <input type="datetime-local" class="form-control date" name="date" required>
                        <label for="accountCode">Date</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control journalEntriesCode" name="journal_entries_code" required>
                        <label for="accountName">Journal Code</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control partner_id" name="partner" required>
                        <label for="accountName">Partner</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control referenceCode" name="reference" required>
                        <label for="type">Reference</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control journal_id" name="journal" aria-label="Select department" required>
                            <option value="" selected>- Select -</option>
                            <?php journalList();?>
                        </select>
                        <label for="type">Journal</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control typeSelection" name="type" aria-label="Select account" id="type">
                            <option value="1" class="currencyType" selected>CREDIT</option>
                            <option value="0" class="currencyType">DEBIT</option>
                        </select>
                        <label for="currency">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control totalAmount" name="total" required>
                        <label for="defaultTaxes">Total</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control statusSelection" name="status" aria-label="Select account"
                            id="currency">
                            <option value="1" class="currencyType" selected>Active</option>
                            <option value="0" class="currencyType">Inactive</option>
                        </select>
                        <label for="currency">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="editJournalEntry">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END EDIT journal entry -->
<!-- Delete Journal Entry -->
<div class="modal fade" id="deleteJournalEntry" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Delete Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="journal_entries_id" name="journal_entries_id">
                    <div class="text-center">
                        <p>
                            Delete Journal Entry?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-danger float-end" name="deleteJournalEntry">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Journal Entry -->
<!-- CHARTS ADD NEW ACCOUNT -->
<div class="modal fade" id="addNewAccount" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="account_id">Create: New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountCode" name="account_code" required>
                        <label for="accountName">Code</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountDescript" name="account_descript" required>
                        <label for="accountName">Description</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control accountName" name="account_name" aria-label="Select department"
                            required>
                            <option value="" selected>- Select -</option>
                            <?php accountListTypeSelection();?>
                        </select>
                        <label for="Account name TYPE">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control accountAllowRecon" name="account_allowRecon"
                            aria-label="Select department" required>
                            <option value="0" class="accountAllowRecon" selected>NO</option>
                            <option value="1" class="accountAllowRecon" selected>YES</option>
                        </select>
                        <label for="type">Allow Reconciliation</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountDebit" name="account_debit"
                            required>
                        <label for="type">Opening Debit</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountCredit" name="account_credit"
                            required>
                        <label for="defaultTaxes">Opening Credit</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountBalance" name="account_balance"
                            required>
                        <label for="accountBalance">Opening Balance</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountTax" name="account_tax" required>
                        <label for="accountTax">Default Tax</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountTag" name="account_tag">
                        <label for="accountTax">Tags</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control journalId" name="journal" aria-label="Select department" required>
                            <option value="" selected>- Select -</option>
                            <?php allowedJournalList();?>
                        </select>
                        <label for="type">Allowed Journal</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="addNewAccountList">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END CHARTS ADD NEW ACCOUNT -->

<!-- EDIT ACCOUNT LIST -->
<div class="modal fade" id="editAccountingList" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="openCurrency">EDIT: ACCOUNTS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="accountId" name="account_id">
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountCode" name="account_code" required>
                        <label for="accountName">Code</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountDescript" name="account_descript" required>
                        <label for="accountName">Description</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control accountName" name="account_name" aria-label="Select department"
                            required>
                            <option value="" selected>- Select -</option>
                            <?php accountListTypeSelection();?>
                        </select>
                        <label for="Account name TYPE">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control accountAllowRecon" name="account_allowRecon"
                            aria-label="Select department" required>
                            <option value="0" class="accountAllowRecon" selected>NO</option>
                            <option value="1" class="accountAllowRecon" selected>YES</option>
                        </select>
                        <label for="type">Allow Reconciliation</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountDebit" name="account_debit"
                            required>
                        <label for="type">Opening Debit</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountCredit" name="account_credit"
                            required>
                        <label for="defaultTaxes">Opening Credit</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control accountBalance" name="account_balance"
                            required>
                        <label for="accountBalance">Opening Balance</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountTax" name="account_tax" required>
                        <label for="accountTax">Default Tax</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountTag" name="account_tag">
                        <label for="accountTax">Tags</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control journalId" name="journal" aria-label="Select department" required>
                            <option value="" selected>- Select -</option>
                            <?php allowedJournalList();?>
                        </select>
                        <label for="journal">Allowed Journal</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="editAccountingList">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END EDIT ACCOUNT LIST -->
<!-- Delete Account List -->
<div class="modal fade" id="deleteAccountList" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountListTitle">Delete Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="accountId" name="account_id">
                    <div class="text-center">
                        <p>
                            Delete Journal Entry?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-danger float-end" name="deleteAccountList">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Delete Account List -->

<!-- Start Create Taxes  -->
<div class="modal fade" id="newTaxes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewtax">Create Taxes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control taxName" name="tax_name">
                        <label for="taxName">Tax Name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control taxType" name="tax_Type" aria-label="Select taxType" id="taxType">
                            <option value="Sales" class="taxType" selected>Sales</option>
                            <option value="Purchased" class="taxType" selected>Purchased</option>
                            <option value="None" class="taxType" selected>None</option>
                            <option value="" class="taxType" selected></option>
                        </select>
                        <label for="taxType">Tax Type</label>
                    </div>

                    <!-- <div class="col-md-6 form-floating">
                        <select class="form-control" name="taxComputation" aria-label="Select taxComputation"
                            id="taxComputation">
                            <option value="Group Taxes" class="taxComputation" selected>Group Taxes</option>
                            <option value="Fixed" class="taxComputation" selected>Fixed</option>
                            <option value="Percentage of Price" class="taxComputation" selected>Percentage of Price
                            </option>
                            <option value="Percentage of Price Tax Included" class="taxComputation" selected>Percentage
                                of Price Tax Included</option>
                            <option value="" class="taxComputation" selected></option>
                        </select>
                        <label for="taxComputation">Tax Computation</label>
                    </div> -->
                    <div class="col-md-6 form-floating">
                        <select class="form-control taxScope" name="tax_scope" aria-label="Select taxScope"
                            id="taxScope">
                            <option value="Services" class="taxScope" selected>Services</option>
                            <option value="Goods" class="taxScope" selected>Goods</option>
                            <option value="" class="taxScope" selected></option>
                        </select>
                        <label for="taxScope">Tax Scope</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control statusTax" name="status_tax" aria-label="Select taxType"
                            id="taxType">
                            <option value="0" class="status" selected>Active</option>
                            <option value="1" class="status" selected>Inactive</option>
                            <option value="" class="status" selected></option>
                        </select>
                        <label for="status">Status</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control taxAmount" name="tax_amount">
                        <label for="taxAmount">Amount</label>
                    </div>

                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="taxDefinition-tab" data-bs-toggle="tab"
                                data-bs-target="#taxDefinition" type="button" role="tab" aria-controls="taxDefinition"
                                aria-selected="true">Definitions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="advanceOptions-tab" data-bs-toggle="tab"
                                data-bs-target="#advanceOptions" type="button" role="tab" aria-controls="advanceOptions"
                                aria-selected="false">Advance Options</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="taxDefinition" role="tabpanel"
                            aria-labelledby="taxDefinition-tab">
                            <div>
                                <div>
                                    <p6>
                                        Distribution for Invoices
                                    </p6>
                                </div><br>
                                <div class="col-md-12 form-floating">
                                    <div id="containerTable">
                                        <table class="table" id="dynamicTableTax">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Base On</th>
                                                    <th>Account</th>
                                                    <th>Tax Grids</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-secondary  btn-sm"
                                            onClick="addNewRowTableTax();">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="advanceOptions" role="tabpanel"
                            aria-labelledby="advanceOptions-tab">
                            <div>
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control taxName" name="taxName">
                                    <label for="taxName">Label on Invoices</label>
                                </div><br>

                                <div class="col-md-12 form-floating">
                                    <select class="form-control" name="accountListDebit" aria-label="Select account"
                                        id="account_id">
                                        <option value="" class="accounListDebitSelection" selected>- Select -</option>
                                        phpcode accountListSelection();?>
                                    </select>
                                    <label for="accountDebit">Allowed account types</label>
                                </div><br>

                                <div class="col-md-12 form-floating">
                                    <select class="form-control" name="accountListDebit" aria-label="Select account"
                                        id="account_id">
                                        <option value="" class="accounListDebitSelection" selected>- Select -</option>
                                        php code accountListSelection();?>
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
                    </div><br> -->

                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success float-end" name="newTaxes">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Taxes -->
<!-- Start Edit Taxes  -->
<div class="modal fade" id="taxEditOption" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewtax">EDIT Taxes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="taxId" name="tax_id">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control taxName" name="tax_name">
                        <label for="taxName">Tax Name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control taxType" name="tax_Type" aria-label="Select tax_Type" id="taxType">
                            <option value="Sales" selected>Sales</option>
                            <option value="Purchased" selected>Purchased</option>
                            <option value="None" selected>None</option>
                            <option value="" class="taxType" selected></option>
                        </select>
                        <label for="taxType">Tax Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" step="0.01" class="form-control taxAmount" name="tax_amount">
                        <label for="taxAmount">Amount</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control taxScope" name="tax_scope" aria-label="Select taxScope"
                            id="taxScope">
                            <option value="Services" selected>Services</option>
                            <option value="Goods" selected>Goods</option>
                            <option value="" class="taxScope" selected></option>
                        </select>
                        <label for="taxScope">Tax Scope</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control statusTax" name="status_tax" aria-label="Select taxType"
                            id="taxType">
                            <option value="1" class="status" selected>Active</option>
                            <option value="0" class="status" selected>Inactive</option>
                            <option value="" class="status" selected></option>
                        </select>
                        <label for="status">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success float-end" name="taxEditOption">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Taxes -->
<!-- Delete tax -->
<div class="modal fade" id="deleteTaxOption" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountListTitle">Delete Tax</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="taxId" name="tax_id">
                    <input type="text" class="taxName border border-0 text-align= center" name="tax_name" readonly>
                    <div class="text-center">
                        <p>
                            Delete This Tax?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-danger float-end" name="deleteTaxOption">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete tax -->
<!-- ADD NEW BANK ACCOUNT -->
<div class="modal fade" id="newbankAccount" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bank_id">ADD: New Bank Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-12 form-floating">
                        <input type="number" class="form-control accountNum" name="account_num" required>
                        <label for="accountName">Account Number</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountOwner" name="account_owner" required>
                        <label for="accountName">Account Owner</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control bankName" name="bank_name" required>
                        <label for="accountName">Bank Name</label>
                    </div>
                    <div class="col-6 form-floating">
                        <select class="form-control bankType" name="bank_type" aria-label="Select department" required>
                            <option value="Debit Card" selected>Debit Card</option>
                            <option value="Credit Card" selected>Credit Card</option>
                        </select>
                        <label for="Account name TYPE">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control bankCurrency" name="bank_currency" aria-label="Select department"
                            required>
                            <option value="USD" selected>$ USD</option>
                            <option value="PHP" selected>₱ PHP</option>
                        </select>
                        <label for="type">CURRENCY</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="newbankAccount">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END ADD NEW BANK ACCOUNT -->
<!-- EDIT BANK ACCOUNT -->
<div class="modal fade" id="bankEditOption" tabindex="-1" role="dialog" aria-labelledby="addAccountList"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="">Edit: BANK ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="bankId" name="bank_id">
                    <div class="col-12 form-floating">
                        <input type="number" class="form-control accountNum" name="account_num" required>
                        <label for="accountName">Account Number</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control accountOwner" name="account_owner" required>
                        <label for="accountName">Account Owner</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" class="form-control bankName" name="bank_name" required>
                        <label for="accountName">Bank Name</label>
                    </div>
                    <div class="col-6 form-floating">
                        <select class="form-control bankType" name="bank_type" aria-label="Select department" required>
                            <option value="Debit Card" selected>Debit Card</option>
                            <option value="Credit Card" selected>Credit Card</option>
                        </select>
                        <label for="Account name TYPE">Type</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control bankCurrency" name="bank_currency" aria-label="Select department"
                            required>
                            <option value="USD" selected>$ USD</option>
                            <option value="PHP" selected>₱ PHP</option>
                        </select>
                        <label for="type">CURRENCY</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="bankEditOption">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- END EDIT BANK ACCOUNT -->


<script>
// this function for open journal internal link
$('#openJournalInternalLink').click(function() {
    $('#journalDestination').val($('#journalSource').val())
});

// this funtion for currency internal link
$('#currencyInternalLink').click(function() {
    $('#currencyDestination').val($('#currencySource').val())
});

// create new for allowed accounts in advance settings in nav tab
$('select[name=allowedAccount]').change(function() {
    if ($(this).val() == '') {
        var show = $(this).val();
        $('#allowedAccountsTable').modal('show');
    }
});
$('select[name=allowedAccountType]').change(function() {
    if ($(this).val() == '') {
        var show = $(this).val();
        $('#allowedAccountsTypeTable').modal('show');
    }
});

$('#allowedAccount').change(function() {
    if ($(this).val() == '') {
        var show = $(this).val();
        $('#allowedAccountsTable').modal('show');
    }
});
$('#allowedAccountType').change(function() {
    if ($(this).val() == '') {
        var show = $(this).val();
        $('#allowedAccountsTypeTable').modal('show');
    }
});

// this function id for nav tab select option
//for miscellaneuos tab 
$('#accountStatusOptions').on('change', function() {
    if ($(this).val() === "Miscellaneous") {
        $("#miscellaneousNavTab").show()
    } else {
        $("#miscellaneousNavTab").hide();
    }
});
//for bank tab
$('#accountStatusOptions').on('change', function() {
    if ($(this).val() === "Bank") {
        $("#bankNavTab").show()
    } else {
        $("#bankNavTab").hide();
    }
});
//for Sales tab
$('#accountStatusOptions').on('change', function() {
    if ($(this).val() === "Sales") {
        $("#salesNavTab").show()
    } else {
        $("#salesNavTab").hide();
    }
});
//for Purchase Tab
$('#accountStatusOptions').on('change', function() {
    if ($(this).val() === "Purchase") {
        $("#purchaseNavTab").show()
    } else {
        $("#purchaseNavTab").hide();
    }
});
cashNavTab
//for Cash Tab
$('#accountStatusOptions').on('change', function() {
    if ($(this).val() === "Cash") {
        $("#cashNavTab").show()
    } else {
        $("#cashNavTab").hide();
    }
});
cashNavTab
</script>