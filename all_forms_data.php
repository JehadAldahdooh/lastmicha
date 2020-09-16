<?php

session_start();

include_once 'config/Database_Conn.php';
include_once 'classes/Analysis.php';
include_once 'classes/Cell_line.php';
include_once 'classes/Experiment.php';

$database = new Database_Conn();
$db = $database->getConnection();


$record_cell = new Cell_line($db,session_id());
$record_expr = new Experiment($db,session_id());
$record_an   = new Analysis($db,session_id());


$result_cell=$record_cell->list_all($_POST['fname'],$_POST['sname']);
$result_expr=$record_expr->list_all($_POST['fname'],$_POST['sname']);
$result_an=$record_an->list_all($_POST['fname'],$_POST['sname']);



	$output = array(
			"cell_data"	=>	$result_cell,			
			"an_data"	=> 	$result_an,
			"expr_data"	=>  $result_expr
		);

		echo json_encode($output);




?>