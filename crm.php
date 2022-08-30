<?php 
    include 'includes/queries.php';
    require_once('includes/conn.php');

    $sqlLead = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '1' AND delete_flag = '0' ORDER BY lead_id ASC";
    $leadResult = mysqli_query($conn, $sqlLead);
    $sqlOpportunity = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '2' AND delete_flag = '0' ORDER BY lead_id ASC";
    $opportunityResult = mysqli_query($conn, $sqlOpportunity);
    $sqlProposition = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '3' AND delete_flag = '0' ORDER BY lead_id ASC";
    $propositionResult = mysqli_query($conn, $sqlProposition);
    $sqlWon = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '4' AND delete_flag = '0' ORDER BY lead_id ASC";
    $wonResult = mysqli_query($conn, $sqlWon);
    $sqlLost = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '5' AND delete_flag = '0' ORDER BY lead_id ASC";
    $lostResult = mysqli_query($conn, $sqlLost);

    $leadList = mysqli_fetch_all($leadResult, MYSQLI_ASSOC);
    $opportunityList = mysqli_fetch_all($opportunityResult, MYSQLI_ASSOC);
    $propositionList = mysqli_fetch_all($propositionResult, MYSQLI_ASSOC);
    $wonList = mysqli_fetch_all($wonResult, MYSQLI_ASSOC);
    $lostList = mysqli_fetch_all($lostResult, MYSQLI_ASSOC);

    mysqli_free_result($leadResult);
    mysqli_free_result($opportunityResult);
    mysqli_free_result($propositionResult);
    mysqli_free_result($wonResult);
    mysqli_free_result($lostResult);

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<!-- asd -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"
                        data-bs-target="#newLead">
                        <span>
                            <i class="fa fa-plus"></i>
                            New
                        </span>
                    </button>
                    <div aria-label="breadcrumb" class="breadcrumbs float-end mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CRM</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body stages ">
                    <div class="row row-cols-5">
                        <div class="col border rounded prospect-col">
                            <h5>Prospect</h5>
                            <div id="prospect" class="list_containers h-100">
                                <?php 
                                    foreach($leadList as $key => $li){
                                ?>
                                <div class="card ui-widget-content border m-3 listitems "
                                    data-itemid=<?php echo $li['lead_id'] ?>>
                                    <div class="card-header prospect-header">
                                        <p class="fw-bolder d-inline-block mx-auto"><?php echo $li['name'] ?></p>
                                        <div class="prospect-btn-delete">
                                            <button data-itemid=<?php echo $li['lead_id'] ?>
                                                class="btn deleteLead btn-danger btn-sm float-end d-inline-block">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="prospect-dropdown">
                                            <button class="btn btn-sm float-end colordropdown" type="button"
                                                id="colordropdown" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                <ul class="dropdown-menu" aria-labelledby="colordropdown">
                                                    <li class="red"><img src="assets/icons/red.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="blue"><img src="assets/icons/blue.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="green"><img src="assets/icons/green.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="black"><img src="assets/icons/black.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="gold"><img src="assets/icons/gold.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="brown"><img src="assets/icons/brown.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="indigo"><img src="assets/icons/indigo.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="maroon"><img src="assets/icons/maroon.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="orange"><img src="assets/icons/orange.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                    <li class="pink"><img src="assets/icons/pink.png"
                                                            style="width: 30px;  height: 30px;"></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="card-body crm-body">
                                        <p><?php echo $li['email'] ?></p>
                                        <p><?php echo $li['contact_number'] ?></p>
                                        <p><?php echo $li['description'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col border rounded access-col">
                            <h5>Access</h5>
                            <div id="access" class="list_containers h-100">
                                <?php 
                                    foreach($opportunityList as $key => $oi){
                                ?>
                                <div class="card ui-widget-content border m-3 listitems"
                                    data-itemid=<?php echo $oi['lead_id'] ?>>
                                    <div class="card-header access-header">
                                        <p class="fw-bolder d-inline-block mx-auto"><?php echo $oi['name'] ?></p>
                                        <div class="access-btn-delete">
                                            <button data-itemid=<?php echo $oi['lead_id'] ?>
                                                class="btn deleteLead btn-danger btn-sm float-end d-inline-block">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="access-dropdown">
                                            <button class="btn btn-sm float-end colordropdown" type="button"
                                                id="colordropdown" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                <ul class="dropdown-menu" aria-labelledby="colordropdown">
                                                    <li class="red"><img src="assets/icons/red.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="blue"><img src="assets/icons/blue.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="green"><img src="assets/icons/green.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="black"><img src="assets/icons/black.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="gold"><img src="assets/icons/gold.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="card-body crm-body">
                                        <p><?php echo $oi['email'] ?></p>
                                        <p><?php echo $oi['contact_number'] ?></p>
                                        <p><?php echo $oi['description'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>

                        </div>

                        <div class="col border rounded proposition-col">
                            <h5>Proposal and Negotiation</h5>
                            <div id="proposition" class="list_containers h-100">
                                <?php 
                                    foreach($propositionList as $key => $pi){
                                ?>
                                <div class="card ui-widget-content border m-3 listitems"
                                    data-itemid=<?php echo $pi['lead_id'] ?>>
                                    <div class="card-header proposition-header">
                                        <p class="fw-bolder d-inline-block mx-auto"><?php echo $pi['name'] ?></p>
                                        <div class="proposition-btn-delete">
                                            <button data-itemid=<?php echo $oi['lead_id'] ?>
                                                class="btn deleteLead btn-danger btn-sm float-end d-inline-block">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="proposition-dropdown">
                                            <button class="btn btn-sm float-end colordropdown" type="button"
                                                id="colordropdown" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                <ul class="dropdown-menu" aria-labelledby="colordropdown">
                                                    <li class="red"><img src="assets/icons/red.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="blue"><img src="assets/icons/blue.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="green"><img src="assets/icons/green.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="black"><img src="assets/icons/black.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="gold"><img src="assets/icons/gold.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="card-body crm-body">
                                        <p><?php echo $pi['email'] ?></p>
                                        <p><?php echo $pi['contact_number'] ?></p>
                                        <p><?php echo $pi['description'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="col border rounded award-col">
                            <h5>Award</h5>
                            <div id="award" class="list_containers h-100">
                                <?php 
                                    foreach($wonList as $key => $wi){
                                ?>
                                <div class="card ui-widget-content border m-3 listitems"
                                    data-itemid=<?php echo $wi['lead_id'] ?>>
                                    <div class="card-header award-header">
                                        <p class="fw-bolder d-inline-block mx-auto"><?php echo $wi['name'] ?></p>
                                        <div class="award-btn-delete">
                                            <button data-itemid=<?php echo $wi['lead_id'] ?>
                                                class="btn deleteLead btn-danger btn-sm float-end d-inline-block">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="award-dropdown">
                                            <button class="btn btn-sm float-end colordropdown" type="button"
                                                id="colordropdown" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                <ul class="dropdown-menu" aria-labelledby="colordropdown">
                                                    <li class="red"><img src="assets/icons/red.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="blue"><img src="assets/icons/blue.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="green"><img src="assets/icons/green.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="black"><img src="assets/icons/black.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="gold"><img src="assets/icons/gold.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="card-body crm-body">
                                        <p><?php echo $wi['email'] ?></p>
                                        <p><?php echo $wi['contact_number'] ?></p>
                                        <p><?php echo $wi['description'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col border rounded delivered-col">
                            <h5>Delivered</h5>
                            <div id="delivered" class="list_containers h-100">
                                <?php 
                                    foreach($lostList as $key => $loi){
                                ?>
                                <div class="card ui-widget-content border m-3 listitems"
                                    data-itemid=<?php echo $loi['lead_id'] ?>>
                                    <div class="card-header crm-header">
                                        <p class="fw-bolder d-inline-block mx-auto"><?php echo $loi['name'] ?></p>
                                        <div class="delivered-btn-delete">
                                            <button data-itemid=<?php echo $wi['lead_id'] ?>
                                                class="btn deleteLead btn-danger btn-sm float-end d-inline-block">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="delivered-dropdown">
                                            <button class="btn btn-sm float-end colordropdown" type="button"
                                                id="colordropdown" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                <ul class="dropdown-menu" aria-labelledby="colordropdown">
                                                    <li class="red"><img src="assets/icons/red.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="blue"><img src="assets/icons/blue.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="green"><img src="assets/icons/green.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="black"><img src="assets/icons/black.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                    <li class="gold"><img src="assets/icons/gold.png"
                                                            style="width: 25px;  height: 25px;"></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="card-body crm-body">
                                        <p><?php echo $loi['email'] ?></p>
                                        <p><?php echo $loi['contact_number'] ?></p>
                                        <p><?php echo $loi['description'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php'; ?>

    <script type="text/javascript">
    $(".list_containers").sortable({
        connectWith: ".list_containers"
    })
    $(".listitems").draggable({
        connectToSortable: ".list_containers",
        containment: '.stages',
    });

    $("#prospect").droppable({

        drop: function(event, ui) {

            $(this).addClass("ui-state-highlight");

            var lead_id = ui.draggable.attr('data-itemid')

            $.ajax({
                method: "POST",

                url: "includes/queries.php",
                data: {
                    'action': 1,
                    'lead_id': lead_id,
                },
            }).done(function(data) {
                var result = $.parseJSON(data);

            });
        }
    });
    $("#access").droppable({

        drop: function(event, ui) {

            $(this).addClass("ui-state-highlight");

            var lead_id = ui.draggable.attr('data-itemid')

            $.ajax({
                method: "POST",

                url: "includes/queries.php",
                data: {
                    'lead_id': lead_id,
                    'action': 2,
                },
            }).done(function(data) {
                var result = $.parseJSON(data);

            });
        }
    });
    $("#proposition").droppable({

        drop: function(event, ui) {

            $(this).addClass("ui-state-highlight");

            var lead_id = ui.draggable.attr('data-itemid')

            $.ajax({
                method: "POST",

                url: "includes/queries.php",
                data: {
                    'lead_id': lead_id,
                    'action': 3,
                },
            }).done(function(data) {
                var result = $.parseJSON(data);

            });
        }
    });
    $("#award").droppable({

        drop: function(event, ui) {

            $(this).addClass("ui-state-highlight");

            var lead_id = ui.draggable.attr('data-itemid')

            $.ajax({
                method: "POST",

                url: "includes/queries.php",
                data: {
                    'lead_id': lead_id,
                    'action': 4,
                },
            }).done(function(data) {
                var result = $.parseJSON(data);

            });
        }
    });
    $("#delivered").droppable({

        drop: function(event, ui) {

            $(this).addClass("ui-state-highlight");

            var lead_id = ui.draggable.attr('data-itemid')

            $.ajax({
                method: "POST",

                url: "includes/queries.php",
                data: {
                    'lead_id': lead_id,
                    'action': 5,
                },
            }).done(function(data) {
                var result = $.parseJSON(data);

            });
        }
    });

    $('.deleteLead').on('click', function() {
        var lead_id = $(this).data('itemid');
        $.ajax({
            method: 'POST',
            url: 'includes/queries.php',
            data: {
                'lead_id': lead_id,
                'delete': 'delete',
            },
        });
        $(document).ajaxStop(function() {
            window.location.reload();
        });
    })

    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>