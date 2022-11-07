<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
</head>

<body>
<?php include 'header.php'; ?>
    <div class="wrapper">
    <?php include 'sidebar.php'; ?>
    <div id="content" class="w-100">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">
                    
                </div>
            </div>
            <div class="row py-5 m-2">
                <!-- <div class="image-container">
                    <img src="assets/accounting.jpg" class="image img-fluid">
                </div> -->
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
                    <div class="card">
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
                <div class="card" id="cardbgcolor">
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-6 py-3">
                                    <h5>ASSETS</h5>
                                    
                                    <!-- this is a chart FOR ASSETS-->

                                    <div id="lineChartAsset" style="width: 600px; height: 300px; margin:0 auto;"
                                        class="form-control shadow-lg p-3 mb-4 bg-body rounded">
                                    </div>
                                    <!-- <button class="btn btn-default text-white bg-secondary bg-gradient btn-flat btn-sm"
                                        id="viewmore" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalAsset"><i class="fa fa-plus"></i> View More</button> -->


                                    <?php 
                                        require_once 'includes/conn.php';
                                        $query = "SELECT MONTHNAME(journal_date), (SUM(amount)-(SELECT SUM(amount)FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code=ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE (gl.group_name = 'Current Assets' AND ji.amount_type = 2) OR (gl.group_name = 'Non-current assets' AND ji.amount_type = 2)GROUP BY MONTH(journal_date))) FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code=ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE (gl.group_name = 'Current Assets' AND ji.amount_type = 1) OR (gl.group_name = 'Non-current assets' AND ji.amount_type = 1) GROUP BY MONTH(journal_date)";
                                        $result = mysqli_query($conn, $query);
                                        
                                        ?>

                                    <script>
                                    google.charts.load('current', {
                                        'packages': ['corechart', 'line']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Month ', 'Assets'],
                                            <?php
                                                            while($row = mysqli_fetch_array($result)){
                                                                echo "['".$row["MONTHNAME(journal_date)"]."', ".$row["(SUM(amount)-(SELECT SUM(amount)FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code=ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE (gl.group_name = 'Current Assets' AND ji.amount_type = "]."],"; 
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
                                <div class="col-6 py-3">

                                    <h5>REVENUE</h5>
                                    <!-- this is a chart 2 -->

                                    <div id="lineChartRevenue" style="width: 600px; height: 300px; margin:0 auto;"
                                        class="form-control shadow-lg p-3 mb-4 bg-body rounded">
                                    </div>
                                    <!-- <button class="btn btn-default text-white bg-secondary bg-gradient btn-flat btn-sm"
                                        id="viewmore" type="button"><i class="fa fa-plus"></i> View More</button> -->

                                    <?php 
                                        require_once 'includes/conn.php';
                                        $query = "SELECT MONTHNAME(journal_date), SUM(amount), je.journal_entry_id, ji.amount, gl.group_id, gl.group_name, gl.type FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code=ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE gl.group_id =2 GROUP BY MONTH(journal_date)";
                                        $result = mysqli_query($conn, $query);
                                        
                                        ?>

                                    <script>
                                    // for google chart
                                    google.charts.load('current', {
                                        'packages': ['corechart', 'line']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Month', 'Revenue'],
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
                                            colors: ['#fca311'],
                                            legend: {
                                                position: 'bottom'
                                            }
                                        };

                                        var chart = new google.visualization.LineChart(document.getElementById(
                                            'lineChartRevenue'));

                                        chart.draw(data, options);
                                    }
                                    </script>


                                    <!-- end of chart -->
                                </div>
                                <div class="col-6 py-3">
                                    <h5>EXPENSES</h5>
                                    <!-- this is a chart 3 -->

                                    <div id="lineChartRevenue2" style="width: 600px; height: 300px; margin:0 auto;"
                                        class="form-control shadow-lg p-3 mb-4 bg-body rounded">
                                    </div>
                                    <!-- <button class="btn btn-default text-white bg-secondary bg-gradient btn-flat btn-sm"
                                        id="viewmore" type="button"><i class="fa fa-plus"></i> View More</button> -->

                                    <?php 
                                        require_once 'includes/conn.php';
                                        $query = "SELECT MONTHNAME(journal_date), SUM(amount), je.journal_entry_id, ji.amount, gl.group_id, gl.group_name, gl.type FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code = ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE gl.group_id =3 GROUP BY MONTH(journal_date)";
                                        $result = mysqli_query($conn, $query);
                                        ?>

                                    <script>
                                    // for google chart
                                    google.charts.load('current', {
                                        'packages': ['corechart']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Month', 'Expenses'],
                                            <?php
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "['".$row["MONTHNAME(journal_date)"]."', ".$row["SUM(amount)"]."],"; 
                                                    }
                                                    ?>

                                        ]);

                                        var options = {
                                            title: '',
                                            pointsVisible: true,
                                            colors: ['#d90429'],

                                            legend: {
                                                position: 'bottom'
                                            }
                                        };

                                        var chart = new google.visualization.LineChart(document.getElementById(
                                            'lineChartRevenue2'));

                                        chart.draw(data, options);
                                    }
                                    </script>


                                    <!-- end of chart -->
                                </div>
                                <div class="col-6 py-3">
                                    <h5>LIABILITY</h5>
                                    <!-- this is a chart 4 -->

                                    <div id="lineChartGross" style="width: 600px; height: 300px; margin:0 auto;"
                                        class="form-control shadow-lg p-3 mb-4 bg-body rounded">
                                    </div>
                                    <!-- <button class="btn btn-default text-white bg-secondary bg-gradient btn-flat btn-sm"
                                        id="viewmore" type="button"><i class="fa fa-plus"></i> View More</button> -->

                                    <?php 
                                        require_once 'includes/conn.php';
                                        $query = "SELECT MONTHNAME(journal_date), SUM(amount), je.journal_entry_id, ji.amount, gl.group_id, gl.group_name, gl.type FROM journal_entries AS je INNER JOIN journal_items as ji ON je.journal_entry_code = ji.journal_entry_code INNER JOIN group_list as gl ON ji.group_id = gl.group_id WHERE gl.group_id = 4 AND ji.amount_type = 2 GROUP BY MONTH(journal_date)";
                                        $result = mysqli_query($conn, $query);
                                        ?>

                                    <script>
                                    // for google chart
                                    google.charts.load('current', {
                                        'packages': ['corechart']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Month', 'Liability'],
                                            <?php
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "['".$row["MONTHNAME(journal_date)"]."', ".$row["SUM(amount)"]."],"; 
                                                    }
                                                    ?>

                                        ]);

                                        var options = {
                                            title: '',
                                            colors: ['#9e2a2b'],
                                            pointsVisible: true,
                                            legend: {
                                                position: 'bottom'
                                            }
                                        };

                                        var chart = new google.visualization.LineChart(document.getElementById(
                                            'lineChartGross'));

                                        chart.draw(data, options);
                                    }
                                    </script>


                                    <!-- end of chart -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                url: 'get_rows.php',
                data: {
                    id: id,
                    deptRow: true,
                },
                dataType: 'json',
                success: function(response) {
                    $('.departmentId').val(response.department_id);
                    $('.departmentName').val(response.department_name);
                }
            });

        })
    }
    </script>
</body>

</html>