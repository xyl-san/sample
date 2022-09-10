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
            <div>
                <h4>Invoices</h4>
                <button class="btn btn-light">Create</button>
            </div><br>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">0%
                </div>
            </div>
            <div class="row py-3 m-2">
                <div class="image-container">
                    <img src="assets/accounting.jpg" class="image img-fluid">
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Company Data</h5>
                            <p class="card-text">Set your company's data for documents header/footer.</p>
                            <div class="col-md-12 text-center">
                                <a data-bs-target="#" class="btn btn-outline-secondary btn-sm btn-flat mt-2"
                                    data-bs-toggle="modal">Let's start!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Invoice Layout</h5>
                            <p class="card-text">Customize the look of your invoices.</p>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn btn-outline-secondary btn-sm btn-flat mt-2">Customize</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="card-title">Create Invoice</h5>
                            <p class="card-text">Create your first invoice.</p>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn btn-outline-secondary btn-sm btn-flat mt-2">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=table>
                <table class="table table-reponsive" id="invoiceTable">
                    <tr>
                        <th></th>
                        <th>Number</th>
                        <th>Customer</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>Source Department</th>
                        <th class>Reference</th>
                        <th class="sales_person">Sales Person</th>
                        <th class="next_activity">Next Activity</th>
                        <th class="tax_excluded">Tax Excluded</th>
                        <th class="tax">Tax</th>
                        <th class="total">Total</th>
                        <th class="total_in_currentcy">Total in Currency</th>
                        <th class="amount_due">Amount Due</th>
                        <th class="invoice_currency">Invoice Currency</th>
                        <th class="to_check">To Check</th>
                        <th class="payment_status">Payment Status</th>
                        <th class="electronic_invoicing">Electronic Invoicing</th>
                        <th class="status">Status</th>
                        <th>
                            <div class="dropdown">
                                <button class="btn me-md-2" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="sales_person" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Sales Person</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="next_activity" role="menuitemcheckbox"><label
                                                class="custom-control-label">Next Activity</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="tax_excluded" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Tax Excluded</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="tax" role="menuitemcheckbox"><label
                                                class="custom-control-label">Tax</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="total" role="menuitemcheckbox"><label
                                                class="custom-control-label">Total</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="total_in_currentcy" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Total in Currency</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="amount_due" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Amount Due</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="invoice_currency" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Invoice Currency</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="to_check" role="menuitemcheckbox"><label
                                                class="custom-control-label"> To Check</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="payment_status" role="menuitemcheckbox"><label
                                                class="custom-control-label">Payment Status</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="electronic_invoicing" role="menuitemcheckbox"><label
                                                class="custom-control-label"> Electronic Invoicing</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                                name="status" role="menuitemcheckbox"><label
                                                class="custom-control-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tbody>
                        <!-- Queries -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'journal_entry_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.department_id').val(response.department_id);
                    $('.department').val(response.department_name);
                    $('.delete_department_name').html(response.department_name);

                }
            });

        })
    }

    $("input:checkbox:not(:checked)").each(function() {
        var column = "table ." + $(this).attr("name");
        $(column).hide();
    });

    $("input:checkbox").click(function() {
        var column = "table ." + $(this).attr("name");
        $(column).toggle();
    });
    </script>

</body>

</html>