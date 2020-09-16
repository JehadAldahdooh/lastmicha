	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


if(!empty($_POST["keyword"])) {

	$dbconn = pg_connect("host=192.168.4.173 dbname=compounds_20 user=fimm password=pxqgBsFLTwTzc")
			  or die('Could not connect: ' . pg_last_error());

$query3 = "";

			
						if($_POST["type"]== 'c_name'){


					$query2 = "
			select distinct cell_line   from fimm.micha_protocols p WHERE cell_line like '" . strtoupper($_POST["keyword"]). "%'  ";
			   $query3 = "select distinct cell_line from fimm.micha_protocols p WHERE cell_line like '" . strtoupper($_POST["keyword"]) . "%'  " ;

						}else if($_POST["type"]== 'c_provenance'){
					$query2 = "
			select distinct cell_line_provenance from fimm.micha_protocols p WHERE cell_line_provenance like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct cell_line_provenance from fimm.micha_protocols p WHERE cell_line_provenance like '" . strtoupper($_POST["keyword"]) . "%'  " ;
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
<ul id="Cell_line_name-list" style="z-index:1000!important; background: lightslategray; ">
<?php

	$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$data = array();
		
	while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
	$nestedData = array();
	

	
	
	
	
	
	

			if($_POST["type"]== 'c_name'){
					$nestedData[] = $line2["cell_line"];

?>
<li onClick="selectCell_line_name('<?php  echo $line2["cell_line"]; ?>');"><?php echo $line2["cell_line"]; ?></li>

<?php 
				
				
			}else if($_POST["type"]== 'c_provenance'){
					$nestedData[] = $line2["cell_line_provenance"];

			?>	
			<li onClick="selectCell_line_provenance('<?php  echo $line2["cell_line_provenance"]; ?>');"><?php echo $line2["cell_line_provenance"]; ?></li>

<?php 			
				
			}


$data[] = $nestedData;
	}
	
?>
</ul>
<?php

} }

	?>			
