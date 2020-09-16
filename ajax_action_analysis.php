<?php
		session_start();

include_once 'config/Database_Conn.php';
include_once 'classes/Analysis.php';
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
ini_set('memory_limit', '-1');


$database = new Database_Conn();
$db = $database->getConnection();

$record = new Analysis($db,session_id());

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords($_POST['fname'],$_POST['sname']);
}
if(!empty($_POST['action_an']) && $_POST['action_an'] == 'addRecord') {	

	//$record->analysis_normalization    = $_POST["Analysis_Normalization"];
  //  $record->analysis_formulas         = $_POST["Analysis_Formulas"];
    $record->citation                  = $_POST["Analysis_reference"];
	$record->analysis_result           = $_POST["Analysis_result"];
	//$record->analysis_pipeline_name    = $_POST["Analysis_pipeline_name"];
	//$record->analysis_pipeline_address = $_POST["Analysis_pipeline_Address"];
	$record->min_concentration         = $_POST["min_concentration"];
	$record->max_concentration         = $_POST["max_concentration"];
	$record->filename 		           = $_POST["filename_an"];

	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}
if(!empty($_POST['action_an']) && $_POST['action_an'] == 'updateRecord') {
	print_r("nono nononono");
	
	$record->id = $_POST["id_an"];
	
		print_r($_POST["id_an"]);


	//$record->analysis_normalization = $_POST["Analysis_Normalization"];
   // $record->analysis_formulas = $_POST["Analysis_Formulas"];
    $record->citation = $_POST["Analysis_reference"];
	$record->analysis_result = $_POST["Analysis_result"];
	//$record->analysis_pipeline_name = $_POST["Analysis_pipeline_name"];
	//$record->analysis_pipeline_address = $_POST["Analysis_pipeline_Address"];
	$record->min_concentration = $_POST["min_concentration"];
	$record->max_concentration = $_POST["max_concentration"];
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
?>