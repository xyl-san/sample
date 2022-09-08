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
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="float-end mt-2">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Group List</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="callout border-primary shadow rounded-0">
                        <h4 class="text-muted">Filter Date</h4>
                        <form action="" id="filter">
                            <div class="row align-items-end">
                                <div class="col-md-4 form-group">
                                    <label for="from" class="control-label">Date From</label>
                                    <input type="date" id="from" name="from" value="2022-08-29"
                                        class="form-control form-control-sm rounded-0">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="to" class="control-label">Date To</label>
                                    <input type="date" id="to" name="to" value="2022-09-05"
                                        class="form-control form-control-sm rounded-0">
                                </div>
                                <div class="col-md-4 form-group">
                                    <button class="btn btn-default bg-gradient-navy btn-flat btn-sm"><i
                                            class="fa fa-filter"></i> Filter</button>
                                    <button class="btn btn-default border btn-flat btn-sm" id="print" type="button"><i
                                            class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </form>
                    </div> <br>
                    <h3 class="text-center"><b>Accounting Journal Management System</b></h3>
                    <h4 class="text-center"><b>Working Trial Balance</b></h4>
                    <p class="m-0 text-center">
                        <?php
                            $date = date("F j, Y H:i:s - A");
                            echo $date;
                        ?></p>
                    <table id="accounting" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Reference Code</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php workingTrialBalanceTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Reference Code</th>
                                <th>Amount</th>
                            </tr>
                        </tfoot>
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
            $('#editJournalEntry').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteJournalEntry').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'joural_entry_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.groupId').val(response.group_id);
                    $('.groupName').val(response.name);
                    $('.groupDescription').val(response.description);
                    $('.groupTypeSelection').val(response.type);
                    $('.groupStatusSelection').val(response.status);
                    $('.deleteGroupName').html(response.name);

                }
            });

        })
    }
    </script>
    <script>
    function dateTime {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;
        document.write(today);
    }
    </script>

</body>

</html>