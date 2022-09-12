<?php include 'includes/queries.php';?>
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
</head>
  
<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">0%
                </div>
            </div>
            <div class="row py-5 m-2">
                <div class="image-container">
                    <img src="assets/accounting.jpg" class="image img-fluid">
                </div>
                <div class="col px-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Accounting Periods</h5>
                            <p class="card-text">Define your fiscal years and taxes returns periodicity.</p>
                            <div class="col-md-12 text-center">
                                <a data-bs-target="#newConfigure" class="btn btn-outline-secondary btn-sm btn-flat mt-2"
                                    data-bs-toggle="modal">Configure</a>
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
                                <a href="#" class="btn btn-outline-secondary">Add Bank Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-3 px-2 m-2" id="cardbgcolor">
                    <div class="card-body">
                        <a href="customer_invoice.php"><button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-plus"></i> Add
                            New</button></a>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown">

                        </div>
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
                <div class="card col-3 px-2 m-2" id="cardbgcolor">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-upload"></i>
                            Upload</button>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
                <div class="card col-3 px-2 m-2" id="cardbgcolor">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-plus"></i> New
                            Entry</button>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <div class="card col-3 px-2 m-2" id="cardbgcolor">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-rotate"></i> Online
                            Synchronization</button>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
                <div class="card col-3 px-2 m-2" id="cardbgcolor">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-plus"></i> New
                            Transaction</button>
                        <button type="button" class="btn btn-sm float-end"><i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <canvas id="myChart5"></canvas>
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
        <script>
        var xValues = ["2018", "2019", "2020", "2021", "2022"];
        var yValues = [15, 25, 50, 75, 100];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Customer Invoices"
                }
            }
        });
        var xValues = ["2018    ", "2019", "2020", "2021", "2022"];
        var yValues = [15, 25, 50, 75, 100];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Vendor Bills"
                }
            }
        });
        var xValues = ["2018    ", "2019", "2020", "2021", "2022"];
        var yValues = [15, 25, 50, 75, 100];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Bank"
                }
            }
        });
        var xValues = ["2018    ", "2019", "2020", "2021", "2022"];
        var yValues = [15, 25, 50, 75, 100];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Cash"
                }
            }
        });

        var xValues = ["2018    ", "2019", "2020", "2021", "2022"];
        var yValues = [15, 25, 50, 75, 100];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart5", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Miscellaneous Operations"
                }
            }
        });
        </script>
</body>

</html>