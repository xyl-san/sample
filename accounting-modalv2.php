<?php 
$account_arr = [];
$group_arr = [];
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `journal_entries` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<!-- Add NEW JOURNAL ENTRY MODAL -->

<div class="modal fade w-90" id="newJournalEntry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-file-circle-plus"></i>
                    CREATE JOURNAL ENTRY</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="journal-form" action="includes/sample.php" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <input type="hidden" class="journalId" name="journal_entry_id " value="<?= isset($id) ? $id :'' ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="row-body">
                            <div class="row w-auto justify-content-end">
                                <div class="col-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Date</span>
                                        <input type="date" class="form-control journDate" id="theDate"
                                            name="journal_date"
                                            value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Code</span>
                                        <input type="text" class="form-control journCode" name="code">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Employee</span>
                                        <select type="text" class="employee form-control" name="employee_id">
                                            <option value="" disable></option>
                                            <?php employeeList();?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-4 form-group">
                                <label for="description" class="control-label">
                                    <h6>Description</h6>
                                </label>
                                <input type="text" id="description" name="journal_entry_description"
                                    class="form-control form-control-sm journalDescription" required>
                            </div>
                            <div class="col-md-6 p-4 form-group">
                                <label for="partner" class="control-label">
                                    <h6>Partner</h6>
                                </label>
                                <input type="text" id="partner" name="partner"
                                    class="form-control form-control-sm partner"
                                    placeholder="SOON TO BE ADD ON Database">
                            </div>
                        </div>
                        <div class="row-body form-control bg-light">
                            <div class="container px-4  ">
                                <div class="row gx-5 ">
                                    <div class="col">
                                        <div class="p-3 bg-light">
                                            <div class="col p-2">
                                                <h6>Account</h6>
                                                <select class="form-select accountName select2" id="account_id"
                                                    name="account_name" aria-label="Default select example"
                                                    onchange="gettingList()">
                                                    <option value="" disabled selected></option>
                                                    <?php accountListRow();?>
                                                </select>


                                            </div>
                                            <div class="col p-2">
                                                <h6>Accounting Group</h6>
                                                <select class="form-select groupName select2" id="group_id"
                                                    name="group_name" aria-label="Default select example">
                                                    <option value="" disabled selected></option>
                                                    <?php groupListRow();?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col p-4">
                                        <div class="p-3  bg-light">
                                            <div class="col p-2">
                                                <h6>Amount</h6>
                                                <input type="number" step="any" id="amount" class="form-control amount"
                                                    name="amount">
                                            </div>
                                            <div class="col p-2">
                                                <button
                                                    class="btn btn-default text-white bg-success bg-gradient btn-flat btn-sm"
                                                    id="add_to_list" type="button"><i class="fa fa-plus"></i> Add
                                                    Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="account_list" class="table table-stripped table-bordered gx-3">
                            <colgroup>
                                <col width="5%">
                                <col width="35%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                                <tr class="bg-info bg-gradient">
                                    <th class="text-center">Tool</th>
                                    <th class="text-center">Account</th>
                                    <th class="text-center">Group</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($id)):
                                    $jitems = $conn->query("SELECT j.*,a.account_name as account, g.group_name as `group`, g.type FROM `journal_items` j inner join account_list a on j.account_id = a.account_id inner join group_list g on j.group_id = g.group_id where journal_entry_id = '{$id}'");
                                    while($row = $jitems->fetch_assoc()):
                                    ?>
                                <tr>
                                    <td class="text-center">
                                        <!-- <button class="btn btn-sm btn-outline btn-danger btn-flat delete-row"
                                            type="button"><i class="fa fa-times"></i></button> -->
                                    </td>

                                </tr>
                                <?php endwhile; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-gradient-secondary">
                                <tr>
                                    <th colspan="3" class="text-center">Total</th>
                                    <th class="text-right total_debit">0.00</th>
                                    <th class="text-right total_credit">0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"></th>
                                    <th colspan="3" class="text-center total-balance">0</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <noscript id="item-clone">
                    <tr>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline btn-danger btn-flat delete-row" type="button"><i
                                    class="fa fa-times"></i></button>
                        </td>
                        <td class="">
                            <input type="hidden" name="account_id[]" value="">
                            <input type="hidden" name="group_id[]" value="">
                            <input type="hidden" name="amount[]" value="">
                            <span class="account"></span>
                        </td>
                        <td class="group"></td>
                        <td class="debit_amount text-right"></td>
                        <td class="credit_amount text-right"></td>
                    </tr>
                </noscript>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn-sm btn btn-success" name="addNewJournal">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- END OF ADD NEW JOURNAL  -->
<!-- modal for CHARTS ASSET -->
<div class="modal fade w-90" id="modalAsset" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-file-circle-plus"></i>
                    GRAPH of ASSETS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- this is a chart -->

                <div id="lineChartAssetbig" style="width: 700px; height: 300px;" class="form-control">
                </div><br>


                <?php 
                      require_once 'includes/conn.php';
                       $query = "SELECT MONTHNAME(journal_date), SUM(amount), je.journal_entry_id, ji.amount, gl.group_id, gl.group_name FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_id=ji.journal_entry_id INNER JOIN group_list as gl ON ji.group_id = gl.group_id GROUP BY YEAR(je.journal_date), MONTH(journal_date)";
                         $result = mysqli_query($conn, $query);
                  ?>

                <script>
                // for google chart
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales'],
                        <?php
                         while($row = mysqli_fetch_array($result)){
                             echo "['".$row["MONTHNAME(journal_date)"]."', ".$row["SUM(amount)"]."],"; 
                                                                  }
                         ?>

                    ]);

                    var options = {
                        title: 'Company Performance',
                        curveType: 'function',

                        legend: {
                            position: 'bottom'
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById(
                        'lineChartAssetbig'));

                    chart.draw(data, options);
                }
                </script>

                <!-- end of chart -->
            </div>
        </div>
    </div>
</div>
<!-- END modal for CHARTS ASSET -->

<!-- ADD NEW BANK ACCOUNT -->
<div class="modal fade w-90" id="addNewBankAccount" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-money-check"></i>
                    BANK ACCOUNT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/sample.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="col-6 form-floating">
                        <select class="form-control bankName" name="bank_name" aria-label="Select bank" required>
                            <option value="" selected>- Select -</option>
                            <?php bankSelection(); ?>
                        </select>
                        <label for="jobSelection">Bank</label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountNumber" name="bank_account_number"
                            placeholder="Account Number" minlength="10" maxlength="13" required>
                        <label>Account Number</label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountName" name="bank_account_name"
                            placeholder="Account Name" required>
                        <label for="lastName">Account Name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control company" name="bank_company" placeholder="Company"
                            required>
                        <label for="lastName">Company</label>
                    </div>
                    <div class="col form-floating">
                        <textarea class="form-control tArea address" rows="2" name="bank_address" placeholder="Address"
                            required></textarea>
                        <label for="addressInfo">Address</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="email" class="form-control email" name="bank_email" placeholder="E-mail" required>
                        <label>E-mail</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control contactInfo phonenum" name="bank_phone"
                            placeholder="Phone Number" required>
                        <script>
                        document.querySelector('.phonenum').addEventListener('input', function(e) {
                            var foo = this.value.split("-").join("");
                            if (foo.length > 0) {
                                foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
                            }
                            this.value = foo;
                        });
                        </script>
                        <label for="contactInfo">Phone Number</label>
                    </div>
                    <div class="col-6 form-floating">
                        <select class="form-control country" name="bank_country" aria-label="Select department"
                            required>
                            <option value="Philippines" selected>Philippines</option>
                        </select>
                        <label for="departmentSelection">Country</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control zipCode" name="bank_zip_code" placeholder="Zip Code"
                            required>
                        <label>Zip Code</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="addBank">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END ADD NEW BANK ACCOUNT -->
<!--EDIT BANK ACCOUNT -->
<div class="modal fade w-90" id="editBankAccount" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-money-check"></i></i>
                    UPDATE BANK ACCOUNT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" action="includes/sample.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="bankAccountId" name="bank_account_id">
                    <div class="col-6 form-floating">
                        <select class="form-control bankName" name="bank_name" aria-label="Select bank" required>
                            <option value="" selected>- Select -</option>
                            <?php bankSelection(); ?>
                        </select>
                        <label for="jobSelection">Bank</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountNumber rege" name="bank_account_number"
                            placeholder="Account Number" minlength="10" maxlength="13" required>
                        <label>Account Number</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control accountName" name="bank_account_name"
                            placeholder="Account Name" required>
                        <label for="lastName">Account Name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control company" name="bank_company" placeholder="Company"
                            required>
                        <label for="lastName">Company</label>
                    </div>
                    <div class="col form-floating">
                        <textarea class="form-control tArea address" rows="2" name="bank_address" placeholder="Address"
                            required></textarea>
                        <label for="addressInfo">Address</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="email" class="form-control email" name="bank_email" placeholder="E-mail" required>
                        <label>E-mail</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control contactInfo phone" name="bank_phone"
                            placeholder="Phone Number" required>
                        <script>
                        document.querySelector('.phone').addEventListener('input', function(e) {
                            var foo = this.value.split("-").join("");
                            if (foo.length > 0) {
                                foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
                            }
                            this.value = foo;
                        });
                        </script>
                        <label for="contactInfo">Phone Number</label>
                    </div>
                    <div class="col-6 form-floating">
                        <select class="form-control country" name="bank_country" aria-label="Select department"
                            required>
                            <option value="1" selected>Philippines</option>
                        </select>
                        <label for="departmentSelection">Country</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control zipCode" name="bank_zip_code" placeholder="Zip Code"
                            required>
                        <label>Zip Code</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editBankAccount">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT BANK ACCOUNT -->
<!-- Delete BANK ACCOUNT -->
<div class="modal fade" id="deleteBankAccount" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BankAccountDelete">Delete BANK ACCOUNT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/sample.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="bankAccountId" name="bank_account_id">
                    <div class="text-center">
                        <p>
                            Delete This BANK ACCOUNT?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-danger float-end" name="deleteBankAccount">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete BANK ACCOUNT -->

<!-- Customer Data for Invoice modal -->
<div class="modal fade" id="selectCustomer" tabindex="-1" aria-labelledby="selectCustomer" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="selectCustomer">Add Existing Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="invoiceCustomerList">
                    <colgroup>
                        <col width="20%">
                        <col width="15%">
                        <col width="15%">
                        <col width="5%">

                    </colgroup>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php storeCustomer();?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- END Customer Data for Invoice modal -->
<!-- Sales Person for Invoice modal -->
<div class="modal fade" id="selectSalesPerson" tabindex="-1" aria-labelledby="selectSalesPerson" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="selectSalesPerson">Select Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="invoiceCustomerList">
                    <colgroup>
                        <col width="90%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php salesPerson();?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Sales Person for Invoice modal -->
<!-- modal New Journal Entry ADD-->
<div class="modal fade w-80" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-book"></i> Create Journal
                    Entry</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/sample.php" id="journAdd" method="POST">
                    <div class="">
                        <div class="row py-2 align-items-start">
                            <div class="col input-group">
                                <span class="input-group-text" id="basic-addon1">JOURNAL CODE</span>
                                <input type="text" class="form-control code text-dark bg bg-white" name="code"
                                    value="JRE-<?php echo (new DateTime())->format('mY'); ?>-00<?php journalEntryCode();?>"
                                    style="--bs-text-opacity: .5;" readonly>
                            </div>
                            <div class="col input-group">
                                <span class="input-group-text" id="basic-addon1">Date</span>
                                <input type="date" class="form-control journDate" name="journal_date"
                                    value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class=" p-2 row align-items-start">
                            <div class="col-6 g-2 py-2 row border rounded-1">
                                <div class="form-floating">
                                    <select class="form-control employee" name="employee_id">
                                        <option value=""> </option>
                                        <?php employeeSelection();?>
                                    </select>
                                    <label for="account" class="">Employee</label>
                                </div>
                                <div class="col-6 form-floating ">
                                    <select class="form-control bg-info account" name="account" id="accountListJourn"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <?php accountListRow();?>
                                    </select>
                                    <label for="account" class="">Account</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <select class="form-control bg-warning group" name="group" id="groupListJourn"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <?php groupListRow();?>
                                    </select>
                                    <label for="account" class="">Group</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="number" class="form-control amount bg-success" id="amountJourn"
                                        onchange="this.value = Math.abs(this.value)" style="--bs-bg-opacity: .25;">
                                    <label for="" class="">Amount</label>
                                </div>

                                <div class="col-3 form-floating">
                                <select class="form-control type" name="type" id="typeId"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <option value="1">DEBIT</option>
                                        <option value="2">CREDIT</option>
                                    </select>
                                    <label for="" class="">TYPE</label>
                                </div>
                                <div class="col-3">
                                    <button type="button" class=" btn btn-success p-3  amount form-control"
                                        name="amount" id="myButton"><i class="fa-solid fa-file-circle-plus"></i>
                                        ADD</button>
                                </div>

                            </div>
                            <div class="col-6 px-4 py-2 g-2 row align-items-start">
                                <div class=" form-floating">
                                    <input type="text" class="description form-control" name="journal_entry_description"
                                        style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase();" placeholder="Description" required>
                                    <label for="">Description</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="partner form-control" name="partner"
                                        placeholder="Partner" required>
                                    <label for="">Partner</label>
                                </div>

                            </div>
                        </div>

                        <table id="tableJourn" class="table table-stripped table-bordered gx-3">
                            <colgroup>

                                <col width="30%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                                <col width="5%">
                            </colgroup>
                            <thead>
                                <tr class="bg-dark bg-gradient text-white">
                                    <th>Account</th>
                                    <th>Group</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Tool</th>
                                </tr>
                            </thead>
                            <tbody id="bodys"></tbody>
                            <tfoot>
                                <tr class="bg-gradient-secondary">
                                </tr>
                                <tr class=" border">
                                    <th></th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right totalDebit">0.00</th>
                                    <th class="text-right totalCredit">0.00</th>
                                </tr>

                                <tr class=" border">
                                    <th colspan="2" class="text-center"></th>
                                    <th colspan="2" class="text-center totalBalanceJourn" id="totalCol">0</th>
                                </tr>

                            </tfoot>
                            <input type="hidden" name="totalcatch" id="totalcatch" readonly value="0">
                        </table>

                        <noscript id="cloneThis">
                            <tr>
                                <td class="">
                                    <input type="hidden" class="accountName" name="account_ids[]" value="">
                                    <input type="hidden" class="groupName" name="group_ids[]" value="">
                                    <input type="hidden" class="amount" name="amounts[]" value="">
                                    <input type="hidden" class="amountType" name="amountType[]" value="">
                                    <span class="accountsD" id="accD"></span>
                                </td>
                                <td class="groupsD"></td>
                                <td class="debitAmounts text-right"></td>
                                <td class="creditAmounts text-right"></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline btn-danger btn-flat delRow" id="deleteRow"
                                        type="button"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </noscript>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="journAddnewEntry">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

<script>
var account = $.parseJSON('<?= json_encode($account_arr ) ?>')
var group = $.parseJSON('<?= json_encode($group_arr) ?>')

function cal_tb() {
    var debit = 0;
    var credit = 0;
    $('#account_list tbody tr').each(function() {
        if ($(this).find('.debit_amount').text() != "")
            debit += parseFloat(($(this).find('.debit_amount').text()).replace(/,/gi, ''));
        if ($(this).find('.credit_amount').text() != "")
            credit += parseFloat(($(this).find('.credit_amount').text()).replace(/,/gi, ''));
    })
    $('#account_list').find('.total_debit').text(parseFloat(debit).toLocaleString('en-US', {
        style: 'decimal'
    }))
    $('#account_list').find('.total_credit').text(parseFloat(credit).toLocaleString('en-US', {
        style: 'decimal'
    }))
    $('#account_list').find('.total-balance').text(parseFloat(debit - credit).toLocaleString('en-US', {
        style: 'decimal'
    }))
}
// trial codes --------------------
// calculate journal Debit and Credit
function calcuAmount() {
    var debitAmount = 0;
    var creditAmount = 0;
    $('#tableJourn tbody tr').each(function() {
        if ($(this).find('.debitAmounts').text() != "") {
            debitAmount += parseFloat(($(this).find('.debitAmounts').text()).replace(/,/gi, ''));
        }
        if ($(this).find('.creditAmounts').text() != "") {
            creditAmount += parseFloat(($(this).find('.creditAmounts').text()).replace(/,/gi, ''));
        }
    })
    var totalamount = debitAmount - creditAmount;
    $('#tableJourn').find('.totalDebit').text(parseFloat(debitAmount).toLocaleString('en-US', {
        style: 'decimal'
    }))
    $('#tableJourn').find('.totalCredit').text(parseFloat(creditAmount).toLocaleString('en-US', {
        style: 'decimal'
    }))
    document.getElementById('totalcatch').value = totalamount;

    //for text color only
    if (totalamount >= 0) {
        $('#tableJourn').find('.totalBalanceJourn').text(parseFloat(totalamount).toLocaleString('en-US', {
            style: 'decimal'
        }))
        document.getElementById("totalCol").style.color = "#196811"
    } else if (totalamount < 0) {
        $('#tableJourn').find('.totalBalanceJourn').text(parseFloat(totalamount).toLocaleString('en-US', {
            style: 'decimal'
        }))
        document.getElementById("totalCol").style.color = "#9E1B18"
    }

}

$('#myButton').click(function() {
    var accountId = $('#accountListJourn').val()
    var groupId = $('#groupListJourn').val()
    var amountx = $('#amountJourn').val()
    var type = $('#typeId').val()

    document.getElementById("accountListJourn").value = "";
    document.getElementById("groupListJourn").value = "";
    document.getElementById("amountJourn").value = "";
    document.getElementById("typeId").value = "";

    var rows = $($('noscript#cloneThis').html()).clone().appendTo("tbody#bodys")
    rows.find('input[name="account_ids[]"]').val(accountId) // add to input field
    rows.find('input[name="group_ids[]"]').val(groupId)
    rows.find('input[name="amounts[]"]').val(amountx)
    rows.find('input[name="amountType[]"]').val(type)
    rows.find('.accountsD').text(!!accountId ? accountId : "NO DATA")
    rows.find('.groupsD').text(!!groupId ? groupId : "NO DATA")
    if (type == '1'){
        rows.find('.debitAmounts').text(parseFloat(amountx).toLocaleString('en-US', {
            style: 'decimal'
            
        }))
        
    } if(type == '2') {
        rows.find('.creditAmounts').text(parseFloat(amountx).toLocaleString('en-US', {
            style: 'decimal'
        }))
       
    }if(type== ''){
        alert("NEED AMOUNT TYPE")
        rows.find('.creditAmounts').text("NO VALUE")
        rows.find('.debitAmounts').text("NO VALUE")
        
    }
    calcuAmount()
    $('#tableJourn').append(tr)

})

$('#tableJourn').on('click', ".delRow", function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    calcuAmount()
});

//catch 
$('#journAdd').submit(function(e) {
    var total = document.getElementById('totalcatch').value;
    var _this = $(this)
    $('.pop-msg').remove()
    var el = $('<div>')
    el.addClass("pop-msg alert")
    el.hide()
    if ($('#tableJourn tbody tr').length <= 0) {
        el.addClass('alert-danger').text(" Account Table is empty.")
        _this.prepend(el)
        el.show('slow')
        return false;
    }
    if (total != 0) {
        el.addClass('alert-danger').text("Trial Balance is not Equal")
        _this.prepend(el)
        el.show('slow')
        return false;
    }
});
//catch
// trial codes--------------------
$(function() {
    if ('<?= isset($id) ?>' == 1) {
        cal_tb()
    }
    $('#account_list th,#account_list td').addClass('align-middle px-2 py-1')
    $('#uni_modal').on('shown.bs.modal', function() {
        $('.select2').select2({
            placeholder: "Please select here",
            width: "100%",
            dropdownParent: $('#uni_modal')
        })
    })
    $('#uni_modal').trigger('shown.bs.modal')

    $('#add_to_list').click(function() {

        var account_id = $('#account_id').val()
        var group_id = $('#group_id').val()
        var amount = $('#amount').val()
        var group_name = $('#group').val()
        var account_data = !!account[account_id] ? account[account_id] : {};
        var group_data = !!group[group_id] ? group[group_id] : {};
        var tr = $($('noscript#item-clone').html()).clone()
        tr.find('input[name="account_id[]"]').val(account_id)
        tr.find('input[name="group_id[]"]').val(group_id)
        tr.find('input[name="amount[]"]').val(amount)
        tr.find('.account').text(!!account_id ? account_id : "NO DATA")
        tr.find('.group').text(!!group_id ? group_id : "NO DATA")
        if (!!group_id && group_id == 'Assets')
            tr.find('.debit_amount').text(parseFloat(amount).toLocaleString('en-US', {
                style: 'decimal'
            }))
        else
            tr.find('.credit_amount').text(parseFloat(amount).toLocaleString('en-US', {
                style: 'decimal'
            }))
        $('#account_list').append(tr)
        tr.find('.delete-row').click(function() {
            $(this).closest('tr').remove()
            cal_tb()
        })
        cal_tb()
        $('#account_id').val('').trigger('change')
        $('#group_id').val('').trigger('change')
        $('#amount').val('').trigger('change')
    })
    $('#uni_modal #journal-form').submit(function(e) {
        e.preventDefault();
        var _this = $(this)
        $('.pop-msg').remove()
        var el = $('<div>')
        el.addClass("pop-msg alert")
        el.hide()
        if ($('#account_list tbody tr').length <= 0) {
            el.addClass('alert-danger').text(" Account Table is empty.")
            _this.prepend(el)
            el.show('slow')
            $('#uni_modal').scrollTop(0)
            return false;
        }
        if ($('#account_list tfoot .total-balance').text() != '0') {
            el.addClass('alert-danger').text(" Trial Balance is not equal.")
            _this.prepend(el)
            el.show('slow')
            $('#uni_modal').scrollTop(0)
            return false;
        }
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=save_journal",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error: err => {
                console.log(err)
                alert_toast("An error occured", 'error');
                end_loader();
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    location.reload();
                } else if (!!resp.msg) {
                    el.addClass("alert-danger")
                    el.text(resp.msg)
                    _this.prepend(el)
                } else {
                    el.addClass("alert-danger")
                    el.text("An error occurred due to unknown reason.")
                    _this.prepend(el)
                }
                el.show('slow')
                $('html,body,.modal').animate({
                    scrollTop: 0
                }, 'fast')
                end_loader();
            }
        })
    })
})
</script>