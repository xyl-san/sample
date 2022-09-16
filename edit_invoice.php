<div class="modal fade" id="editInvoice" tabindex="-1" role="dialog" aria-labelledby="employeeTitle" aria-hidden="true">
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
                            <select class="form-control" aria-label="Select">
                                <option value="" id="customer" class="customer" name="customer_id" selected></option>
                                <?php customerInvoice();?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="invoiceDate" class="form-label">Invoice Date</label>
                            <input type="date" class="form-control invoiceDate" name="invoice_date">
                        </div>
                        <div class="col-md-6">
                            <label for="paymentReference" class="form-label">Payment Reference</label>
                            <input type="text" class="form-control paymentReference"
                                name="payment_reference">
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
                            <select class="form-control termsInvoice" name="terms_Invoice" aria-label="Select terms">
                                <option value="15 Days" class="termsType" selected>15 Days</option>
                                <option value="21 Days" class="termsType" selected>21 Days</option>
                                <option value="30 Days" class="termsType" selected>30 Days</option>
                                <option value="45 Days" class="termsType" selected>45 Days</option>
                                <option value="1 Month" class="termsType" selected>1 Month</option>
                                <option value="2 Months" class="termsType" selected>2 Months</option>
                                <option value="" class="termsType" selected></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="salesPerson" class="form-label">Sales Person</label>
                            <select class="form-control "aria-label="Select">
                                <option value="" class="salesPersonInvoice" name="employee_id" selected></option>
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
                                                    <td><select class="form-control productInvoice" name="product"
                                                            id="product">
                                                            <option value="" selected>
                                                            </option>
                                                            <?php productInvoice();?>
                                                        </select></td>
                                                    <td><select class="form-control labelInvoice" name="label"
                                                            id="label">
                                                            <option value="" selected>
                                                            </option>
                                                            <?php productDescriptionInvoice();?>
                                                        </select></td>
                                                    <td><select class="form-control accountInvoice" name="account_id"
                                                            id="account">
                                                            <option value="" selected>
                                                            </option>
                                                            <?php accountListSelection();?>
                                                        </select></td>
                                                    <td><input class="form-control quantityInvoice" type="number"
                                                            name="quantity" id="quantity" oninput="invoice()">
                                                    </td>
                                                    <td><input class="form-control priceInvoice" type="number" name="price"
                                                            id="price" oninput="invoice()">
                                                    </td>
                                                    <td><input class="form-control taxesInvoice" type="number" name="taxes"
                                                            id="taxes" oninput="invoice()" readonly>
                                                    </td>
                                                    <td><input class="form-control subtotalInvoice" type="number"
                                                            name="subtotal" id="subtotal" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <label for="total_amount" class="form-label">Total
                                                    Amount</label>
                                                <input type="number" class="form-control total_amountInvoice"
                                                    name="total_amount" id="total_amount">
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control border-0 invoiceNotesInvoice"
                                                    name="invoice_notes" id="invoiceNotes" placeholder="Add notes">
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
                                            <input type="text" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Incoterm</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Salesperson</label>
                                            <input value="" type="text" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Fiscal
                                                Position</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Recipient
                                                Bank</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1">
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