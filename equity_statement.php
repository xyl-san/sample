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
                        <h1 style="text-align:center; text-shadow: 2px 3px 8px #A1E14D;">EQUITY</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form class="" name="formBal" id="formBalTable" method="POST" action="#">
                        <div class="row" style="width:40%; margin:auto;">
                            <div class="col-5 g-2 form-floating">
                                <input type="date" class="form-control dateStart" placeholder="Start" name="date_start"
                                    value="<?php 
                                                $a_date = (new DateTime())->format('Y-m-d');
                                                $date = new DateTime($a_date);
                                                $date->modify('first day of this month');
                                                echo $date->format('Y-m-d');?>" />
                                <label>From</label>
                            </div>
                            <div class="col-5 g-2 form-floating">
                                <input type="date" class="form-control dateEnd" placeholder="End" name="date_end" value="<?php 
                                                $a_date = (new DateTime())->format('Y-m-d');
                                                $date = new DateTime($a_date);
                                                $date->modify('last day of this month');
                                                echo $date->format('Y-m-d');?>" />
                                <label>To</label>
                            </div>
                            <div class="col-2">
                                <br>
                                <button type="submit" class=" btn btn-primary btn-sm " name="searchFilter"><i
                                        class="fa-regular fa-calendar"></i> Filter</button>
                            </div>
                        </div>
                        <br>
                        <div class="card-body form-control" style="width:70%; margin:auto;">
                            <div class="py-4 text-center">
                                <h3>VPD BUSINESS SOLUTIONS INC.</h3>
                                <h4>Statement Of Changes in Equity</h4>
                                <h6><?php filterDate(); ?></h6>
                            </div>
                            <table id="" class="table table-responsive-sm assetTable" style="width:70%; margin: auto;">
                                <thead>
                                    <tr>
                                        <th class="">EQUITY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php equityList(); ?>
                                    <tr class="border-top border-2">
                                        <td class="col-5 px-4" style="font-weight: 500;">Total:</td>
                                        <td class="col-7 text-justify px-5" style="font-weight: 500;"> <?php subEquityTotal(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-5 px-4">Profit:</td>
                                        <td class="col-7 text-justify"> <?php profitTotal(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-5 px-5" style="font-weight: 600;">Total Equity:</td>
                                        <td class="col-7 text-justify px-5" style="font-weight: 600;"> <?php equityTotal(); ?></td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="">LESS: Withdrawals</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php withdrawalsList(); ?>
                                    <tr>
                                        <td class="col-6 px-5">Total Withdrawals:</td>
                                        <td class="col-6 text-justify"> <?php withdrawalsTotal(); ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-6">Owner's Equity:</th>
                                        <th class="col-6 text-justify px-5"><?php equityGrandTotal(); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
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
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>