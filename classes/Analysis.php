<?php
class Analysis {	
   
	private $recordsTable = 'analysis_form';

	private $conn;
	private $sid;
	public $filename;   

	public $analysis_normalization;
	public $analysis_formulas;
	public $citation;
	public $analysis_result;
	public $analysis_pipeline_name;
	public $analysis_pipeline_address;
	public $min_concentration;
	public $max_concentration;
	
	
	
	public function __construct($db,$sid){
        $this->conn = $db;
			        $this->sid = $sid;

    }	    
	
	
	public function list_all($fname,$sname){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable.' where session_id="'.$this->sid.'" and file_name="'. $fname .'"  ';
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();
			$rows[] = $record['analysis_normalization'];
			$rows[] = $record['analysis_formulas'];		
			$rows[] = $record['citation'];	
			$rows[] = $record['analysis_result'];
			$rows[] = $record['analysis_pipeline_name'];	
			$rows[] = $record['analysis_pipeline_address'];		
			$rows[] = $record['min_concentration'];	
			$rows[] = $record['max_concentration'];
			$records[] = $rows;
		}
			return  $records ;
	}

	public function listRecords($fname,$sname){
		
	$sqlQuery = "SELECT * FROM ".$this->recordsTable.' where session_id="'.$this->sid.'" and file_name="'. $fname .'"  ';
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
			$rows[] = $record['analysis_normalization'];
			$rows[] = $record['analysis_formulas'];		
			$rows[] = $record['citation'];	
			$rows[] = $record['analysis_result'];
			$rows[] = $record['analysis_pipeline_name'];	
			$rows[] = $record['analysis_pipeline_address'];		
			$rows[] = $record['min_concentration'];	
			$rows[] = $record['max_concentration'];
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
			
		
		$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable."  
			SET analysis_normalization= ?, analysis_formulas = ?, citation = ?, analysis_result = ?, analysis_pipeline_name = ?,
			    analysis_pipeline_address= ?, min_concentration = ?, max_concentration = ? 
			WHERE id = ?");

		   	$this->analysis_normalization = htmlspecialchars(strip_tags($this->analysis_normalization));
		   	$this->analysis_formulas = htmlspecialchars(strip_tags($this->analysis_formulas));
		   	$this->citation = htmlspecialchars(strip_tags($this->citation));
		   	$this->analysis_result = htmlspecialchars(strip_tags($this->analysis_result));
		   	$this->analysis_pipeline_name = htmlspecialchars(strip_tags($this->analysis_pipeline_name));
		   	$this->analysis_pipeline_address = htmlspecialchars(strip_tags($this->analysis_pipeline_address));
		   	$this->min_concentration = htmlspecialchars(strip_tags($this->min_concentration));
		   	$this->max_concentration = htmlspecialchars(strip_tags($this->max_concentration));
		   	$this->id = htmlspecialchars(strip_tags($this->id));
			
			
			$stmt->bind_param("ssssssssi", $this->analysis_normalization, $this->analysis_formulas, $this->citation,
                             			$this->analysis_result, $this->analysis_pipeline_name, $this->analysis_pipeline_address,
										$this->min_concentration, $this->max_concentration,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->analysis_normalization) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`session_id`,`file_name`,`analysis_normalization`,`analysis_formulas`,
			`citation`,`analysis_result`,`analysis_pipeline_name`,`analysis_pipeline_address`,`min_concentration` ,`max_concentration`) 
			 VALUES(?,?,?,?,?,?,?,?,?,?)");
		
		   	$this->analysis_normalization = htmlspecialchars(strip_tags($this->analysis_normalization));
		   	$this->analysis_formulas = htmlspecialchars(strip_tags($this->analysis_formulas));
		   	$this->citation = htmlspecialchars(strip_tags($this->citation));
		   	$this->analysis_result = htmlspecialchars(strip_tags($this->analysis_result));
		   	$this->analysis_pipeline_name = htmlspecialchars(strip_tags($this->analysis_pipeline_name));
		   	$this->analysis_pipeline_address = htmlspecialchars(strip_tags($this->analysis_pipeline_address));
		   	$this->min_concentration = htmlspecialchars(strip_tags($this->min_concentration));
		   	$this->max_concentration = htmlspecialchars(strip_tags($this->max_concentration));
		   	$this->filename = htmlspecialchars(strip_tags($this->filename));
			
			

			$stmt->bind_param("ssssssssss", $this->sid,$this->filename,$this->analysis_normalization, $this->analysis_formulas,
                             			$this->citation,
                            			$this->analysis_result, $this->analysis_pipeline_name,$this->analysis_pipeline_address,
										$this->min_concentration,$this->max_concentration);
			
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