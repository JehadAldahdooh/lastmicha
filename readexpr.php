	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


if(!empty($_POST["keyword"])) {

	$dbconn = pg_connect("host=192.168.4.173 dbname=compounds_20 user=fimm password=pxqgBsFLTwTzc")
			  or die('Could not connect: ' . pg_last_error());

$query3 = "";

			
						if($_POST["type"]== 'experimental_medium'){


					$query2 = "
			select distinct  experimental_medium 
			 from fimm.micha_protocols p WHERE experimental_medium like '" . strtoupper($_POST["keyword"]) . "%'  ";
			   $query3 = "select distinct  experimental_medium 
			 from fimm.micha_protocols p WHERE experimental_medium like '" . strtoupper($_POST["keyword"]) . "%'  " ;

						}else if($_POST["type"]== 'Plate_type'){
					$query2 = "
			select distinct  plate_type 
			 from fimm.micha_protocols p WHERE plate_type like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  plate_type 
			 from fimm.micha_protocols p WHERE plate_type like '" . strtoupper($_POST["keyword"]) . "%'  " ;
						}else if($_POST["type"]== 'Cell_density_at_plating'){
							
					$query2 = "
			select distinct  cell_density 
			 from fimm.micha_protocols p WHERE cell_density like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  cell_density 
			 from fimm.micha_protocols p WHERE cell_density like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}else if($_POST["type"]== 'dilution_fold'){
							
					$query2 = "
			select distinct  dilution_fold 
			 from fimm.micha_protocols p WHERE dilution_fold like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  dilution_fold 
			 from fimm.micha_protocols p WHERE dilution_fold like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}else if($_POST["type"]== 'vehicle'){
							
					$query2 = "
			select distinct  vehicle 
			 from fimm.micha_protocols p WHERE vehicle like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  vehicle 
			 from fimm.micha_protocols p WHERE vehicle like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}else if($_POST["type"]== 'method_dispensation'){
							
					$query2 = "
			select distinct  method_dispensation 
			 from fimm.micha_protocols p WHERE method_dispensation like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  method_dispensation 
			 from fimm.micha_protocols p WHERE method_dispensation like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
						}else if($_POST["type"]== 'volume_per_well'){
							
					$query2 = "
			select distinct  volume_per_well 
			 from fimm.micha_protocols p WHERE volume_per_well like '" . strtoupper($_POST["keyword"]) . "%'  ";

			   $query3 = "select distinct  volume_per_well 
			 from fimm.micha_protocols p WHERE volume_per_well like '" . strtoupper($_POST["keyword"]) . "%'  " ;
							
							
							
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
<ul id="expr-list" style="z-index:1000!important; background: lightslategray; ">
<?php

	$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
$data = array();
		
	while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
	$nestedData = array();
	

	
	
	
	
	
	

			if($_POST["type"]== 'experimental_medium'){
					$nestedData[] = $line2["experimental_medium"];

?>
<li onClick="experimental_medium('<?php  echo $line2["experimental_medium"]; ?>');"><?php echo $line2["experimental_medium"]; ?></li>

<?php 
				
				
			}else if($_POST["type"]== 'Plate_type'){
					$nestedData[] = $line2["plate_type"];

			?>	
			<li onClick="plate_type('<?php  echo $line2["plate_type"]; ?>');"><?php echo $line2["plate_type"]; ?></li>

<?php 			
				
			}
			else if($_POST["type"]== 'Cell_density_at_plating'){
			?>	
			<li onClick="cell_density('<?php  echo $line2["cell_density"]; ?>');"><?php echo $line2["cell_density"]; ?></li>

<?php 			
	
			}else if($_POST["type"]== 'dilution_fold'){
			?>	
			<li onClick="dilution_fold('<?php  echo $line2["dilution_fold"]; ?>');"><?php echo $line2["dilution_fold"]; ?></li>
<?php 			
			}
			
			
			
	else if($_POST["type"]== 'vehicle'){
			?>	
			<li onClick="vehicle('<?php  echo $line2["vehicle"]; ?>');"><?php echo $line2["vehicle"]; ?></li>

<?php 			
							
							
							
						}else if($_POST["type"]== 'method_dispensation'){
									?>	
			<li onClick="method_dispensation('<?php  echo $line2["method_dispensation"]; ?>');"><?php echo $line2["method_dispensation"]; ?></li>

<?php 			
	
							
							
						}else if($_POST["type"]== 'volume_per_well'){
?>	
			<li onClick="volume_per_well('<?php  echo $line2["volume_per_well"]; ?>');"><?php echo $line2["volume_per_well"]; ?></li>

<?php 			

							
							
							
						}		
			
			
			
			
			
			
			

$data[] = $nestedData;
	}
	
?>
</ul>
<?php

} }

	?>			
