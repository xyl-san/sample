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

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#newbankAccount">
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Add Bank Account
                        </span>
                    </button>
                    <a href="Accounting.php"><button type="button" class="btn btn-success btn-sm btn-flat mt-2"
                            data-bs-toggle="modal">
                            <span>
                                <i class="fa-solid fa-square-check"></i>
                                Done
                            </span>
                        </button></a>
                    <nav aria-label="breadcrumb" class="float-end mt-2">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Group List</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Account Holder</th>
                                <th>Bank Name</th>
                                <th>Type</th>
                                <th>Currency</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php bankTable();?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
            $('#bankEditOption').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#bankDeleteOption').modal('show');
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
                    bankRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.bankId').val(response.bank_id);
                    $('.accountNum').val(response.account_num);
                    $('.accountOwner').val(response.account_holder);
                    $('.bankName').val(response.bank_name);
                    $('.bankType').val(response.type);
                    $('.bankCurrency').val(response.currency);
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