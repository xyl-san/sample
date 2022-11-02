<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->

</head>
<!-- START BODY -->

<body>
<?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="card">
                <div class="card-header">
                    <h5>Chart of Accounts</h5>
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#addNewAccount">
                        <span><i class="fa-solid fa-pen-to-square"></i>Add New</span>
                    </button>
                    <a href="Accounting.php">
                        <button type="button" class="btn btn-success btn-sm btn-flat mt-2" data-bs-toggle="modal">
                            <span><i class="fa-solid fa-square-check"></i>Done</span>
                        </button>
                    </a>
                    <nav aria-label="breadcrumb" class="float-end mt-2">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="accounting.php">Accounting</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account List</li>
                        </ol>
                    </nav>
                </div>
                <!-- TABLE FOR ACCOUNT LIST DATA -->
                <div class="shadow-sm card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Allow Reconcilliation</th>
                                    <th>Opening Debit</th>
                                    <th>Opening Credit</th>
                                    <th>Opening Balance</th>
                                    <th>Default Taxes</th>
                                    <th>Tags</th>
                                    <th>Allowed Journals</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php accountListTable();?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Allow Reconcilliation</th>
                                    <th>Opening Debit</th>
                                    <th>Opening Credit</th>
                                    <th>Opening Balance</th>
                                    <th>Default Taxes</th>
                                    <th>Tags</th>
                                    <th>Allowed Journals</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end TABLE FOR ACCOUNT LIST DATA -->
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editAccountingList').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteAccountList').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'get_rows.php',
                data: {
                    id: id,
                    accountListRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.accountId').val(response.account_id);
                    $('.accountCode').val(response.account_code);
                    $('.accountDescript').val(response.account_description);
                    $('.accountName').val(response.account_name);
                    $('.account_allowRecon').val(response.allow_reconciliation);
                    $('.accountDebit').val(response.debit);
                    $('.accountCredit').val(response.credit);
                    $('.accountBalance').val(response.opening_balance);
                    $('.accountTax').val(response.default_taxes);
                    $('.accountTag').val(response.tags);
                    $('.journalId').val(response.journal_id);
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
<!-- END BODY -->

</html>