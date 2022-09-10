<?php 

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