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
            <div class="header">
                <h4>Journal Entries</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                            <!-- <tr>
                                <th>Date</th>
                                <th>Number</th>
                                <th>Partner</th>
                                <th>Reference</th>
                                <th>Journal</th>
                                <th>Total</th>
                                <th>Tax</th>
                                <th>Status</th>
                                <th>To Check</th>
                                <th>Tools</th>
                            </tr> -->
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
                        <?php journalEntryTableList();?>
                        </tbody>
                        <tfoot>
                            <!-- <tr>
                                <th>Date</th>
                                <th>Number</th>
                                <th>Partner</th>
                                <th>Reference</th>
                                <th>Journal</th>
                                <th>Total</th>
                                <th>Tax</th>
                                <th>Status</th>
                                <th>To Check</th>
                                <th>Tools</th>
                            </tr> -->
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
    </script>

</body>

</html>