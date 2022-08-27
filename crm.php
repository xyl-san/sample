<?php 
    include 'includes/queries.php';
    require_once('includes/conn.php');

    $sqlLead = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '1' ORDER BY lead_id ASC";
    $leadResult = mysqli_query($conn, $sqlLead);
    $sqlOpportunity = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '2' ORDER BY lead_id ASC";
    $opportunityResult = mysqli_query($conn, $sqlOpportunity);
    $sqlProposition = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '3' ORDER BY lead_id ASC";
    $propositionResult = mysqli_query($conn, $sqlProposition);
    $sqlWon = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '4' ORDER BY lead_id ASC";
    $wonResult = mysqli_query($conn, $sqlWon);
    $sqlLost = "SELECT lead_id, name, email, contact_number, description, stage_id FROM leads WHERE stage_id = '5' ORDER BY lead_id ASC";
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
                <div class="card-body">
                    <div class="row">
                        <div id="leads" class="col border rounded list_containers">
                            <h5>Leads</h5>
                            <?php 
                                foreach($leadList as $key => $li){
                            ?>
                            <div class="ui-widget-content listitems" data-itemid=<?php echo $li['lead_id'] ?>>
                                <p><?php echo $li['name'] ?></p>
                                <p><?php echo $li['email'] ?></p>
                                <p><?php echo $li['contact_number'] ?></p>
                                <p><?php echo $li['description'] ?></p>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div id="opportunity" class="col border rounded list_containers">
                            <h5>Qualified Opportunity</h5>
                            <?php 
                                foreach($opportunityList as $key => $oi){
                            ?>
                            <div class="ui-widget-content listitems" data-itemid=<?php echo $oi['lead_id'] ?>>
                                <p><?php echo $oi['name'] ?></p>
                                <p><?php echo $oi['email'] ?></p>
                                <p><?php echo $oi['contact_number'] ?></p>
                                <p><?php echo $oi['description'] ?></p>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div id="proposition" class="col border rounded list_containers">
                            <h5>Proposition</h5>
                            <?php 
                                foreach($propositionList as $key => $pi){
                            ?>
                            <div class="ui-widget-content listitems" data-itemid=<?php echo $pi['lead_id'] ?>>
                                <p><?php echo $pi['name'] ?></p>
                                <p><?php echo $pi['email'] ?></p>
                                <p><?php echo $pi['contact_number'] ?></p>
                                <p><?php echo $pi['description'] ?></p>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div id="won" class="col border rounded list_containers">
                            <h5>Won</h5>
                            <?php 
                                foreach($wonList as $key => $wi){
                            ?>
                            <div class="ui-widget-content listitems" data-itemid=<?php echo $wi['lead_id'] ?>>
                                <p><?php echo $wi['name'] ?></p>
                                <p><?php echo $wi['email'] ?></p>
                                <p><?php echo $wi['contact_number'] ?></p>
                                <p><?php echo $wi['description'] ?></p>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div id="lost" class="col border rounded list_containers">
                            <h5>Lost</h5>
                            <?php 
                                foreach($lostList as $key => $loi){
                            ?>
                            <div class="ui-widget-content listitems" data-itemid=<?php echo $loi['lead_id'] ?>>
                                <p><?php echo $loi['name'] ?></p>
                                <p><?php echo $loi['email'] ?></p>
                                <p><?php echo $loi['contact_number'] ?></p>
                                <p><?php echo $loi['description'] ?></p>
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


    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php'; ?>

    <script type="text/javascript">
        $(".listitems").draggable();

        $("#leads").droppable({

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
        $("#opportunity").droppable({

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
        $("#won").droppable({

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
        $("#lost").droppable({

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

        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>