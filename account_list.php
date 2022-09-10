<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#">
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Add New
                        </span>
                    </button>
                   <a href="Accounting.php"><button type="button" class="btn btn-success btn-sm btn-flat mt-2" data-bs-toggle="modal">
                        <span>
                        <i class="fa-solid fa-square-check"></i>
                            Done
                        </span>
                    </button></a>
                    <nav aria-label="breadcrumb" class="float-end mt-2">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account List</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Allow Reconcilliation</th>
                                <th>Opening Debit</th>
                                <th>Opening Credit</th>
                                <th class="opening_balance">Opening Balance</th>
                                <th class="tax_ids">Default Taxes</th>
                                <th class="tag_ids">Tags</th>
                                <th class="allowed_journal_ids">Allowed Journals</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn me-md-2" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-item">
                                                <div class="form-check"><input type="checkbox" class="form-check-input"
                                                        name="opening_balance" role="menuitemcheckbox"><label
                                                        class="custom-control-label"> Opening Balance</label>
                                                </div>
                                            </div>
                                            <div class="dropdown-item"> 
                                                <div class="form-check"><input type="checkbox" class="form-check-input"
                                                        name="tax_ids" role="menuitemcheckbox"><label
                                                        class="custom-control-label"> Default Taxes</label>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="form-check"><input type="checkbox" class="form-check-input"
                                                        name="tag_ids" role="menuitemcheckbox"><label
                                                        class="custom-control-label"> Tags</label>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="form-check"><input type="checkbox" class="form-check-input"
                                                        name="allowed_journal_ids" role="menuitemcheckbox"><label
                                                        class="custom-control-label"> Allowed Journals</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
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
            $('#editAccountList').modal('show');
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
                url: 'account_list_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.accountId').val(response.account_id);
                    $('.accountName').val(response.name);
                    $('.accountDescription').val(response.description);
                    $('.accountStatus').val(response.status);
                    $('.deleteAccountList').html(response.name);
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