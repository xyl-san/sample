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
                        <h1 style="text-align:center; text-shadow: 2px 3px 8px #A1E14D;">BALANCE SHEET</h1>
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
                                <h4>Balance Sheet</h4>
                                <h6><?php filterDate() ?></h6>
                            </div>
                            <table id="" class="table table-responsive-sm assetTable" style="width:70%; margin: auto;">
                                <div class="text-center">
                                    <h4>ASSETS</h4>
                                </div>
                                <thead>
                                    <tr>
                                        <th class="">CURRENT ASSETS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php balanceSheettableCurAsset() ?>
                                    <tr>
                                        <td class="col-5 px-5" style="font-weight: 500;">Total Current Asset:</td>
                                        <td class="col-7 text-justify" style="font-weight: 500;"> <?php curAssetTotal() ?></td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="">NON-CURRENT ASSETS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php balanceSheettableNonCurAsset() ?>
                                    <tr>
                                        <td class="col-6 px-5"style="font-weight: 500;">Total Non-Current Asset:</td>
                                        <td class="col-6 text-justify"style="font-weight: 500;"> <?php nonCurAssetTotal() ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-6">TOTAL ASSETS:</th>
                                        <th class="col-6 text-justify"><?php AssetTotal() ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <table id="" class=" table table-responsive-sm assetTable" style="width:70%; margin: auto;">
                                <div class=" text-center">
                                    <h4>LIABILITIES</h4>
                                </div>
                                <thead>
                                    <tr>
                                        <th class="">CURRENT LIABILITIES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php balanceSheettableCurLiab() ?>
                                    <tr>
                                        <td class="col-5 px-5" style="font-weight: 500;">Total Current Liabilities:</td>
                                        <td class="col-7 text-justify" style="font-weight: 500;"> <?php curLiabTotal() ?></td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="">NON-CURRENT LIABILITIES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php balanceSheettableNonCurLiab() ?>
                                    <tr>
                                        <td class="col-6 px-5" style="font-weight: 500;">Total Non-Current Liabilities:</td>
                                        <td class="col-6 text-justify" style="font-weight: 500;"> <?php nonCurLiabTotal() ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-6">TOTAL LIABILITIES:</th>
                                        <th class="col-6 text-justify"><?php liabTotal() ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <table id="" class=" table table-responsive-sm assetTable" style="width:70%; margin: auto;">
                                <div class=" text-center py-3">
                                    <h4>EQUITY</h4>
                                </div>
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-7 text-justify px-4">Owner's Equity:</td>
                                        <td class="col-5">
                                            <div class="text-justify">
                                                <?php equityGrandTotal() ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="col-6 ">TOTAL LIABILITIES and OWNER'S EQUITY:</th>
                                        <th class="col-6 text-justify"><?php liabAndEquityTotal() ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
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