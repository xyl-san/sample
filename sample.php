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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <?php include 'accounting_sidebar.php'; ?>
        <div id="content" class="w-100">
            <button data-bs-target="#addAccountList" data-bs-toggle="modal" class="btn btn-danger btn-sm">
                Sample
            </button>
        </div>
        <?php include 'includes/scripts.php';?>
        <?php include 'accounting_modal.php';?>
        <?php include 'modals.php';?>


        <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        $('select[name=things]').change(function() {
            if ($(this).val() == '') {
                window.location.href = 'invoices.php';
            }
        });
        </script>
</body>

</html>