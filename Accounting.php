<?php include 'includes/sample.php';?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    
<!-- Google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">
                </div>
            </div>
            <div class="row py-5 m-2">
                <div class="image-container">
                    <img src="assets/accounting.jpg" class="image img-fluid">
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Accounting Period</h5>
                            <p class="card-text">Setup Journals</p><br>
                            <div class="col-md-12 text-center">
                                <a href="journal_entry.php"
                                    class="btn btn-outline-secondary btn-sm btn-flat mt-2">Configure
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Chart of Accounts</h5>
                            <p class="card-text">Setup your charts of accounts and record initial balances. </p>
                            <div class="col-md-12 text-center">
                                <a href="account_list.php" class="btn btn-outline-secondary">Set of Chart Accounts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="card-title">Taxes</h5>
                            <p class="card-text">Set default Taxes for sales and purchase transactions.</p>
                            <div class="col-md-12 text-center">
                                <a href="tax_list.php" class="btn btn-outline-secondary">Set Taxes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="card card">
                        <div class="card-body">
                            <h5 class="card-title">Bank Account</h5>
                            <p class="card-text">Connect your financial accounts in seconds. </p>
                            <div class="col-md-12 text-center">
                                <a href="bank_account.php" class="btn btn-outline-secondary">Add Bank Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col" id="cardbgcolor">
                    <div class="card-body">
                        <a href="invoices.php"><button type="button" class="btn btn-secondary btn-sm"><i
                                    class="fa-solid fa-plus"></i> Add
                                New</button></a>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown">

                        </div>
                        <div id="line_chart"></div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    <?php include 'includes/scripts.php';?>
    <?php include 'accounting_modal.php';?>
    <?php include 'modals.php';?>

    <?php 
        require_once 'includes/conn.php';
        $query = "SELECT YEAR(je.journal_date) AS years, je.journal_entry_id, ji.amount, gl.group_id, gl.group_name FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_id=ji.journal_entry_id INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE gl.group_name = 'assets'";
        $result = mysqli_query($conn, $query);
    ?>

        
    <script>
    // for google chart
    
    
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales'],
              <?php
                while($row = mysqli_fetch_array($result)){
                    echo "['".$row["years"]."', ".$row["amount"]."],"; 
                }
              ?>
    
            ]);
        
            var options = {
              title: 'Company Performance',
              curveType: 'function',
              legend: { position: 'bottom' }
            };
        
            var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
        
            chart.draw(data, options);
          }
    </script>


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
    </script>
        
</body>

</html>