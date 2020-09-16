<?php
class Experiment {	
   
	private $recordsTable = 'expr_form';
	private $conn;
		private $sid;
	public $filename;   

	public $id;
	public $assay_name;   
	public $assay_format;
	public $assay_test_type;
	public $detection_technology;
	public $endpoint_mode;
	public $medium;
	public $plate_type;
	public $measurement;
	public $cell_density_at_plating;
	public $time_of_treatment;
	public $dilution_fold;
	public $vehicle;
	public $method_dispensation;
	public $volume_per_well;

	
	public function __construct($db,$sid){
        $this->conn = $db;
	        $this->sid = $sid;
	
    }	    
	
	
		public function list_all($fname,$sname){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable.' where session_id="'.$this->sid.'" and file_name="'. $fname .'" ' ;
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();
			$rows[] = ucfirst($record['assay_name']);
			$rows[] = $record['assay_format'];		
			$rows[] = $record['assay_test_type'];	
			$rows[] = $record['detection_technology'];
			$rows[] = $record['endpoint_mode'];	
			$rows[] = $record['medium'];		
			$rows[] = $record['plate_type'];	
			$rows[] = $record['measurement'];
			$rows[] = $record['cell_density_at_plating'];	
			$rows[] = $record['time_of_treatment'];		
			$rows[] = $record['dilution_fold'];	
			$rows[] = $record['vehicle'];
			$rows[] = $record['method_dispensation'];	
			$rows[] = $record['volume_per_well'];
			$records[] = $rows;
		}
			return  $records ;
	}



	public function listRecords($fname,$sname){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable.' where session_id="'.$this->sid.'" and file_name="'. $fname .'" ' ;
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR address LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR skills LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable.' where session_id="'.$this->sid.'" and file_name="'. $fname .'" ');
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" type="button" class="btn btn-success btn-sm update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn-sm  delete" >Delete</button>';			
			$rows[] = ucfirst($record['assay_name']);
			$rows[] = $record['assay_format'];		
			$rows[] = $record['assay_test_type'];	
			$rows[] = $record['detection_technology'];
			$rows[] = $record['endpoint_mode'];	
			$rows[] = $record['medium'];		
			$rows[] = $record['plate_type'];	
			$rows[] = $record['measurement'];
			$rows[] = $record['cell_density_at_plating'];	
			$rows[] = $record['time_of_treatment'];		
			$rows[] = $record['dilution_fold'];	
			$rows[] = $record['vehicle'];
			$rows[] = $record['method_dispensation'];	
			$rows[] = $record['volume_per_well'];
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records,
			"query" =>$sqlQuery 
		);
		
		echo json_encode($output);
	}
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "
				SELECT * FROM ".$this->recordsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	public function updateRecord(){
		
		if($this->id) {			

			$stmt = $this->conn->prepare("UPDATE ".$this->recordsTable." 
			SET assay_name= ?, assay_format = ?, assay_test_type = ?, detection_technology = ?, endpoint_mode = ?,
			    medium= ?, plate_type = ?, measurement = ?, cell_density_at_plating = ?, time_of_treatment = ?,
				dilution_fold= ?, vehicle = ?, method_dispensation = ?, volume_per_well = ? 
			WHERE id = ?");
	 
		   	$this->assay_name = htmlspecialchars(strip_tags($this->assay_name));
		   	$this->assay_format = htmlspecialchars(strip_tags($this->assay_format));
		   	$this->assay_test_type = htmlspecialchars(strip_tags($this->assay_test_type));
		   	$this->detection_technology = htmlspecialchars(strip_tags($this->detection_technology));
		   	$this->endpoint_mode = htmlspecialchars(strip_tags($this->endpoint_mode));
		   	$this->medium = htmlspecialchars(strip_tags($this->medium));
		   	$this->plate_type = htmlspecialchars(strip_tags($this->plate_type));
		   	$this->measurement = htmlspecialchars(strip_tags($this->measurement));
		   	$this->cell_density_at_plating = htmlspecialchars(strip_tags($this->cell_density_at_plating));
		   	$this->time_of_treatment = htmlspecialchars(strip_tags($this->time_of_treatment));
		   	$this->dilution_fold = htmlspecialchars(strip_tags($this->dilution_fold));
		   	$this->vehicle = htmlspecialchars(strip_tags($this->vehicle));
		   	$this->method_dispensation = htmlspecialchars(strip_tags($this->method_dispensation));
		   	$this->volume_per_well = htmlspecialchars(strip_tags($this->volume_per_well));
		   	$this->id = htmlspecialchars(strip_tags($this->id));
			
			
			$stmt->bind_param("ssssssssssssssi", $this->assay_name, $this->assay_format, $this->assay_test_type,
                             			$this->detection_technology, $this->endpoint_mode, $this->medium,
										$this->plate_type, $this->measurement, $this->cell_density_at_plating,
										$this->time_of_treatment, $this->dilution_fold, $this->vehicle,
										$this->method_dispensation, $this->volume_per_well, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->assay_name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`session_id`,`file_name`,`assay_name`,`assay_format`,
			`assay_test_type`,`detection_technology`,`endpoint_mode`,`medium`,`plate_type` ,`measurement`,
			`cell_density_at_plating`,`time_of_treatment`,`dilution_fold`,`vehicle`,`method_dispensation`,
			`volume_per_well`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		//print_r($stmt);
		   	$this->assay_name = htmlspecialchars(strip_tags($this->assay_name));
		   	$this->assay_format = htmlspecialchars(strip_tags($this->assay_format));
		   	$this->assay_test_type = htmlspecialchars(strip_tags($this->assay_test_type));
		   	$this->detection_technology = htmlspecialchars(strip_tags($this->detection_technology));
		   	$this->endpoint_mode = htmlspecialchars(strip_tags($this->endpoint_mode));
		   	$this->medium = htmlspecialchars(strip_tags($this->medium));
		   	$this->plate_type = htmlspecialchars(strip_tags($this->plate_type));
		   	$this->measurement = htmlspecialchars(strip_tags($this->measurement));
		   	$this->cell_density_at_plating = htmlspecialchars(strip_tags($this->cell_density_at_plating));
		   	$this->time_of_treatment = htmlspecialchars(strip_tags($this->time_of_treatment));
		   	$this->dilution_fold = htmlspecialchars(strip_tags($this->dilution_fold));
		   	$this->vehicle = htmlspecialchars(strip_tags($this->vehicle));
		   	$this->method_dispensation = htmlspecialchars(strip_tags($this->method_dispensation));
		   	$this->volume_per_well = htmlspecialchars(strip_tags($this->volume_per_well));
		   	$this->filename = htmlspecialchars(strip_tags($this->filename));
		 
			$stmt->bind_param("ssssssssssssssss", $this->sid,$this->filename,$this->assay_name, $this->assay_format, $this->assay_test_type,
                            			$this->detection_technology, $this->endpoint_mode,$this->medium,
										$this->plate_type,$this->measurement,$this->cell_density_at_plating,$this->time_of_treatment,
										$this->dilution_fold,$this->vehicle,$this->method_dispensation,$this->volume_per_well);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>