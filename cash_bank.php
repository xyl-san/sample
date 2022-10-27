<?php include 'includes/sample.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">

            <div class="card">
                <div class="card-header">
                    <!-- <button type="button" class="btn btn-success btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#newJournalEntry">
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Add New Journal Entry
                        </span>
                    </button> -->
                    <div class="row justify-content-center">
                        <h1 style="text-align:center;">Cash and Bank</h1>
                        <!-- this is a chart -->

                        <div id="lineChartAsset" style="auto;"
                            class=" w-75 form-control shadow-lg p-3 mb-4 bg-body rounded">
                        </div>
                        <?php 
                                        require_once 'includes/conn.php';
                                        $query = "SELECT MONTHNAME(journal_date), SUM(amount), item.*, ent.journal_entry_id, ent.journal_entry_code, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE (item.account_id = 1 AND gl.type = 1) AND gl.group_id =1 GROUP BY YEAR(journal_date), MONTH(journal_date)";
                                        $result = mysqli_query($conn, $query);
                                        
                                        ?>

                        <script>
                        google.charts.load('current', {
                            'packages': ['corechart', 'line']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Month ', 'Cash'],
                                <?php
                                      while($row = mysqli_fetch_array($result)){
                                        echo "['".$row["MONTHNAME(journal_date)"]."', ".$row["SUM(amount)"]."],"; 
                                      }
                                       ?>

                            ]);

                            var options = {
                                title: '',
                                curveType: 'function',
                                pointsVisible: true,

                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById(
                                'lineChartAsset'));

                            chart.draw(data, options);
                        }
                        </script>

                        <!-- end of chart -->
                    </div>
                </div>
                <div class="card-body ">
                    <div class="card-body">
                        <table id="journalList" class="table" style="width:100%">
                        <colgroup>
                                <col width="20%">
                                <col width="30%">
                                <col width="30%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Descrition</th>
                                    <th class="text-center">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php cashAndBankInfo() ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center">Total: <?php cashAndBankInfoTotal() ?></th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/scripts.php';?>
        <?php include 'accounting-modalv2.php';?>


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