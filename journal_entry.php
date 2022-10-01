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
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#newJournalEntry" >
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Add New
                        </span>
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Journal Code</th>
                                <th>Partners</th>
                                <th>Reference</th>
                                <th>Journal</th>
                                <th>Total</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php journalEntryTable();?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Date</th>
                                <th>Journal Code</th>
                                <th>Partners</th>
                                <th>Reference</th>
                                <th>Journal</th>
                                <th>Total</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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

    // function getRow(id) {
    //     $(document).ready(function() {
    //         $.ajax({
    //             type: 'POST',
    //             url: 'journal_entry_row.php',
    //             data: {
    //                 id: id
    //             },
    //             dataType: 'json',
    //             success: function(response) {
    //                 $('.groupId').val(response.group_id);
    //                 $('.groupName').val(response.name);
    //                 $('.groupDescription').val(response.description);
    //                 $('.groupTypeSelection').val(response.type);
    //                 $('.groupStatusSelection').val(response.status);
    //                 $('.deleteGroupName').html(response.name);

    //             }
    //         });

    //     })
    // }
//get row for edit journal
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