<?php
	header('Cache-Control: no cache'); //no cache
	session_cache_limiter('private_no_expire'); // works
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('Europe/Helsinki');
	ini_set('session.cookie_lifetime', 1308800.00016);
	include ("database.class.php"); //Include MySQL database class
	include ("mysql.sessions.php"); //Include PHP MySQL sessions
	$session = new Session(); //Start a new PHP MySQL session
	if (session_status() == PHP_SESSION_NONE) {
		ini_set('session.cookie_lifetime', 1308800.00016);
	}
	//echo session_id();
	$file_name = $_POST['file_name'];
	$cname_data = $_POST['cname_data'];
	print_r($cname_data);
	$_SESSION['uploaded_files'][$file_name]['fom2_table'] = $cname_data;
?>