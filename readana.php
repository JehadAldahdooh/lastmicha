	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


if(!empty($_POST["keyword"])) {

	$dbconn = pg_connect("host=192.168.4.173 dbname=compounds_20 user=fimm password=pxqgBsFLTwTzc")
			  or die('Could not connect: ' . pg_last_error());

$query3 = "";

			
						if($_POST["type"]== 'Analysis_reference'){


					$query2 = "
			select distinct  analysis_ref 
			 from fimm.micha_protocols p WHERE analysis_ref like '" . strtoupper($_POST["keyword"]) . "%'  ";
			   $query3 = "select distinct  analysis_ref 
			 from fimm.micha_protocols p WHERE analysis_ref like '" . strtoupper($_POST["keyword"]) . "%'  " ;

						}else if($_POST["type"]== 'Analysis_result'){
					$query2 = "
			select distinct  analysis_metric 
			 from fimm.micha_protocols p WHERE analysis_metric like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  analysis_metric 
			 from fimm.micha_protocols p WHERE analysis_metric like '" . strtoupper($_POST["keyword"]) . "%'  " ;
						}else if($_POST["type"]== 'min_concentration'){
							
					$query2 = "
			select distinct  min_concentration 
			 from fimm.micha_protocols p WHERE min_concentration like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  min_concentration 
			 from fimm.micha_protocols p WHERE min_concentration like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}else if($_POST["type"]== 'max_concentration'){
							
					$query2 = "
			select distinct  max_concentration 
			 from fimm.micha_protocols p WHERE max_concentration like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  max_concentration 
			 from fimm.micha_protocols p WHERE max_concentration like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}

		
	
		//print_r($query2);


	$query4 = "SELECT COUNT(*) as total FROM (".$query3.") as temp";

	
	$result3= pg_query($query4) or die('Query failed: ' . pg_last_error());
	$totalFiltered=0;
	while ($line2 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
	$totalFiltered = $line2["total"];
	}

	
	if($totalFiltered>0){
		
		?>
<ul id="ana-list" style="z-index:1000!important; background: lightslategray; ">
<?php

	$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$data = array();
		
	while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
	$nestedData = array();
	

	
	
	
	
	
	

			if($_POST["type"]== 'Analysis_reference'){
					$nestedData[] = $line2["analysis_ref"];

?>
<li onClick="analysis_ref('<?php  echo $line2["analysis_ref"]; ?>');"><?php echo $line2["analysis_ref"]; ?></li>

<?php 
				
				
			}else if($_POST["type"]== 'Analysis_result'){
					$nestedData[] = $line2["analysis_metric"];

			?>	
			<li onClick="analysis_metric('<?php  echo $line2["analysis_metric"]; ?>');"><?php echo $line2["analysis_metric"]; ?></li>

<?php 			
				
			}
			else if($_POST["type"]== 'min_concentration'){
			?>	
			<li onClick="min_concentration('<?php  echo $line2["min_concentration"]; ?>');"><?php echo $line2["min_concentration"]; ?></li>

<?php 			
	
			}else if($_POST["type"]== 'max_concentration'){
			?>	
			<li onClick="max_concentration('<?php  echo $line2["max_concentration"]; ?>');"><?php echo $line2["max_concentration"]; ?></li>
<?php 			
			}
			
			
			
	
			
			
			
			
			
			
			

$data[] = $nestedData;
	}
	
?>
</ul>
<?php

} }

	?>			
