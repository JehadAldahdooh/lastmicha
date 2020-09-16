<?php

		session_start();

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);



include_once 'config/Database_Conn.php';
include_once 'classes/Cell_line.php';
$database = new Database_Conn();
$db = $database->getConnection();






$record = new Cell_line($db,session_id());




if(!empty($_POST['action_c']) && $_POST['action_c'] == 'listRecords') {
			//echo 'sdsd';

	//print_r("sdsdsdsdsdsd");
	$record->listRecords($_POST['fname'],$_POST['sname']);
	
	




}
if(!empty($_POST['action_c']) && $_POST['action_c'] == 'addRecord') {	



	$record->cell_line_name	 					= $_POST["Cell_line_name"];
    $record->cell_line_provenance 				= $_POST["Cell_line_provenance"];
    $record->CID 								= $_POST["CID"];
	$record->cell_type 							= $_POST["Cell_type"];
	$record->cell_line_organism 				= $_POST["Cell_line_organism"];
	$record->passage_number						= $_POST["Passage_number"];
    $record->modifications 						= $_POST["Modifications"];
    $record->age 								= $_POST["Age"];
	$record->sex 								= $_POST["Sex"];
	$record->diagnosis 							= $_POST["Diagnosis"];
	$record->sample_material					= $_POST["Sample_material"];
    $record->date_of_evaluation 				= $_POST["Date_of_evaluation"];
	$record->date_of_sampling 					= $_POST["Date_of_sampling"];
	$record->filename 							= $_POST["filename_c"];
	
	
		$record->addRecord();
		

		
}
if(!empty($_POST['action_c']) && $_POST['action_c'] == 'getRecord') {
	
	$record->id = $_POST["id_c"];
	$record->getRecord();
}
if(!empty($_POST['action_c']) && $_POST['action_c'] == 'updateRecord') {
	$record->id = $_POST["id_c"];
	$record->cell_line_name	 					= $_POST["Cell_line_name"];
    $record->cell_line_provenance 				= $_POST["Cell_line_provenance"];
    $record->CID 								= $_POST["CID"];
	$record->cell_type 							= $_POST["Cell_type"];
	$record->cell_line_organism 				= $_POST["Cell_line_organism"];
	$record->passage_number						= $_POST["Passage_number"];
    $record->modifications 						= $_POST["Modifications"];
    $record->age 								= $_POST["Age"];
	$record->sex 								= $_POST["Sex"];
	$record->diagnosis 							= $_POST["Diagnosis"];
	$record->sample_material					= $_POST["Sample_material"];
    $record->date_of_evaluation 				= $_POST["Date_of_evaluation"];
	$record->date_of_sampling 					= $_POST["Date_of_sampling"];

	$record->updateRecord();
}
if(!empty($_POST['action_c']) && $_POST['action_c'] == 'deleteRecord') {
	print_r("delete");
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
?>