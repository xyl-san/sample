<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">

            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-center">
                        <h1 style="text-align:center; text-shadow: 2px 3px 3px #9F91D2;">Partner Ledger</h1>

                    </div>
                </div>
                <div class="card-body ">
                    <div class="card-body">
                        <table id="journalList" class="table table-hover table-striped table-bordered">
                            <colgroup>
                                <col width="20%">

                                <col width="80%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Partner Name</th>
                                    <th class="p-2">
                                        <div class="d-flex w-100">
                                            <div class="col-2  border" style="text-align: center">Date</div>
                                            <div class="col-2  border" style="text-align: center">Code</div>
                                            <div class="col-4  border" style="text-align: center">Description</div>
                                            <div class="col-2  border text-center">Debit</div>
                                            <div class="col-2  border text-center">Credit</div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php partnerTable();?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Partner Name</th>
                                    <th class="p-2">
                                        <div class="d-flex w-100">
                                            <div class="col-2  border" style="text-align: center">Code</div>
                                            <div class="col-2  border" style="text-align: center">Code</div>
                                            <div class="col-4  border" style="text-align: center">Description</div>
                                            <div class="col-2  border text-center">Debit</div>
                                            <div class="col-2  border text-center">Credit</div>
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'modals.php';?>
        <?php include 'includes/scripts.php';?>



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
                    url: 'get_rows.php',
                    data: {
                        id: id,
                        ejeRow: true,
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.journal_entries_id').val(response.journal_entries_id);
                        $('.date').val(response.date);
                        $('.journalEntriesCode').val(response.journal_entries_code);
                        $('.partner_id').val(response.partner);
                        $('.referenceCode').val(response.reference);
                        $('.journal_id').val(response.journal_id);
                        $('.typeSelection').val(response.type);
                        $('.totalAmount').val(response.total);
                        $('.statusSelection').val(response.status);

                    }
                });
            })
        }
        </script>
</body>

</html>