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
        <div class="modals">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <p class="text-lg-start">
                                Customer List
                            </p>
                            <table class="table-primary">
                                <thead>
                                    <tr class="table-secondary`">
                                        <th>Number</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Roger Cawater</td>
                                            <td>Quezon City</td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/scripts.php';?>
</body>

</html>

