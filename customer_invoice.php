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
            <div>
                <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i>
                    Save</button>
                <button type="button" class="btn btn-sm"> Discard</button>
            </div><br>
            <div class="d-flex  highlight bg-light ps-3 pe-2 py-1">
                <div>
                    <ul class="nav">
                        <li class="nav-item">
                            <button type="button" class="btn btn-success btn-sm">
                                Confirm</button>
                            <button type="button" class="btn btn-sm">
                                Preview</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" style="width: 100rem;">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:left;">Customer Invoice</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Draft</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>