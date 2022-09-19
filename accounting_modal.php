<!-- edit customer invoice  -->
<div class="modal fade" id="editInvoice" tabindex="-1" role="dialog" aria-labelledby="customerInvoiceTitle"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerInvoiceTitle">Edit Customer Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
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
                                <option value="21 Days" class="termsType" selected>21 Days</option>
                                <option value="30 Days" class="termsType" selected>30 Days</option>
                                <option value="45 Days" class="termsType" selected>45 Days</option>
                                <option value="1 Month" class="termsType" selected>1 Month</option>
                                <option value="2 Months" class="termsType" selected>2 Months</option>
                                <option value="" selected></option>
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
                                        aria-controls="otherInfo-tab-pane" aria-selected="false">Other
                                        Info</button>
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
                                                    <td><select class="form-control" id="product">
                                                            <option value="" class="productId" name="product_id"
                                                                selected>
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
                                                    <td><input class="form-control" type="number" name="quantity"
                                                            id="quantity" oninput="invoice()">
                                                    </td>
                                                    <td><input class="form-control price" type="number" name="price"
                                                            oninput="invoice()">
                                                    </td>
                                                    <td><input class="form-control taxes" type="number" name="taxes"
                                                            oninput="invoice()" readonly>
                                                    </td>
                                                    <td><input class="form-control subtotal" type="number"
                                                            name="subtotal" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <label for="total_amount" class="form-label">Total
                                                    Amount</label>
                                                <input type="number" class="form-control total_amount"
                                                    name="total_amount" id="total_amount">
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control border-0 invoiceNotes"
                                                    name="invoice_notes" placeholder="Add notes">
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
                                            <input value="" type="text"
                                                class="form-control salesPersonInvoiceOtherInfo">
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
                            <button type="button" data-bs-dismiss="modal" class="btn btn-warning">Cancel</button>
                            <button type="submit" class="btn btn-success float-end" name="editInvoice">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete customer invoice  -->
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
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div>
                        <h6>Fiscal Years</h6>
                    </div>
                    <div class="col-md-6">
                        <label for="">Opening Date</label>
                        <input type="date" class="form-control openingDate" name="openingDate"
                            value="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="fiscalYearEnd">Fiscal Year End</label>
                        <input type="date" class="form-control fiscalYearEnd" name="fiscalYearEnd"
                            value="<?php echo date('Y-m-d', strtotime("+1 year"));?>">
                    </div>
                    <div>
                        <h6>Tax Return</h6>
                    </div>
                    <div class="col-md-6">
                        <label for="Journal">Periodicity</label>
                        <select class="form-control periodicity" name="periodicity" aria-label="Select account"
                            id="journalId">
                            <option value="Annually" class="periodicityType" selected>Annually</option>
                            <option value="Semi-Annually" class="periodicityType" selected>Semi-Annually</option>
                            <option value="Quarterly" class="periodicityType" selected>Quarterly</option>
                            <option value="Monthly" class="periodicityType" selected>Monthly</option>
                            <option value="" class="periodicityType" selected></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="reminder">Reminder</label>
                        <input type="number" class="form-control reminder" name="reminder"
                            placeholder="Days after period" required>
                    </div>
                    <div class="col-md-12">
                    <label for="Journal">Journal</label>
                        <div class="input-group ">
                            <select class="form-control journal" name="journal" aria-label="Select account" id="journal">
                            <option value="Cash Basis Taxes" class="journalDescription" selected>Cash Basis Taxes
                            </option>
                            <option value="Exchange Difference" class="journalDescription" selected>Exchange Difference
                            </option>
                            <option value="Miscellaneous Operations" class="journalDescription" selected>Miscellaneous
                                Operations</option>
                            <option value="Inventory Valuation" class="journalDescription" selected>Inventory Valuation
                            </option>
                            <option value="Point of Sale" class="journalDescription" selected>Point of Sale</option>
                            <option value="" class="journalDescription" selected></option>
                        </select>
                                <a type="button" class="input-group-text text-hover" title="Open Journal"  data-bs-target="#newFiscal" data-bs-toggle="modal">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
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
<div class="modal fade" id="newFiscal" tabindex="-1" role="dialog" aria-labelledby="accountingPeriods"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountingPeriods">Open: Journal</h5>
                <a href="journal_entry.php"><button type="button" class="btn btn-outline-secondary"><i
                            class="fa-solid fa-book"></i>
                        Journal Entries</button></a>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">

                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control accountingPeriods" name="accountingPeriods"
                            id="journalTransfer">
                        <label for="accountingPeriods">Journal Name</label>
                    </div>

                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="accountStatus" aria-label="Select account"
                            id="accountStatus">
                            <option value="5" class="Status" selected>Sales</option>
                            <option value="4" class="Status" selected>Purchase</option>
                            <option value="3" class="Status" selected>Cash</option>
                            <option value="2" class="Status" selected>Bank</option>
                            <option value="1" class="Status" selected>Miscellaneous</option>
                            <option value="" class="Status" selected>--Select--</option>
                        </select>
                        <label for="Journal ">Type</label>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="journal-tab" data-bs-toggle="tab"
                                data-bs-target="#journalEntryId" type="button" role="tab" aria-controls="journalEntryId"
                                aria-selected="true">Journal Entries</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="advanceSetting-tab" data-bs-toggle="tab"
                                data-bs-target="#advanceSetting" type="button" role="tab" aria-controls="advanceSetting"
                                aria-selected="false">Advance Setting</button>
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
                                    <input type="text" class="form-control text-uppercase shortCode" name="shortCode">
                                    <label for="shortCode">Short Code</label>
                                </div><br>
                                <div class="col-md-12 form-floating">
                                    <select class="form-control currency" name="currency" aria-label="Select account"
                                        id="accountStatus">
                                        <option value="2" class="currencyId" selected>PHP</option>
                                        <option value="1" class="currencyId" selected>USD</option>
                                        <option value="" class="currencyId" selected>--Select--</option>
                                    </select>
                                    <label for="Journal ">Currency</label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="advanceSetting" role="tabpanel"
                            aria-labelledby="advanceSetting-tab">
                            <div>
                                <div>
                                    <p6>
                                        Control-Access
                                    </p6>
                                </div><br>
                                <div class="col-md-12 form-floating">
                                    <select class="form-control" name="accountListDebit" aria-label="Select account"
                                        id="account_id">
                                        <option value="" class="accounListDebitSelection" selected>- Select -</option>
                                        <?php accountListSelection();?>
                                    </select>
                                    <label for="accountDebit">Allowed account types</label>
                                </div><br>
                                <div class="col-md-12 form-floating">
                                    <select class="form-control" name="accountListDebit" aria-label="Select account"
                                        id="account_id">
                                        <option value="" class="accounListDebitSelection" selected>- Select -</option>
                                        <?php accountListSelection();?>
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
                    <div class="mb-2">
                        <button type="button" data-bs-target="#newConfigure" data-bs-toggle="modal"
                            class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-success float-end" name="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End open journal modal  -->




<!-- this function for transfering data from textfeild to another textfeild -->
<script>
window.onload = function() {
    var src = document.getElementById("journal"),
        dst = document.getElementById("journalTransfer");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
};

</script>