<?php
class Cell_line {	
	private $recordsTable = 'cell_line_form';

	private $conn;
	private $sid;
	public $filename;   
	public $id;
	public $cell_line_name;
	public $cell_line_provenance;
	public $CID;
	public $cell_type;
	public $cell_line_organism;
	public $passage_number;
	public $modifications;
	public $age;
	public $sex;
	public $diagnosis;
	public $sample_material;
	public $date_of_evaluation;
	public $date_of_sampling;

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
			$rows[] = $record['cell_line_name'];
			$rows[] = $record['cell_line_provenance'];		
			$rows[] = $record['CID'];	
			$rows[] = $record['cell_type'];
			$rows[] = $record['cell_line_organism'];	
			$rows[] = $record['passage_number'];		
			$rows[] = $record['modifications'];	
			$rows[] = $record['age'];
			$rows[] = $record['sex'];	
			$rows[] = $record['diagnosis'];		
			$rows[] = $record['sample_material'];	
			$rows[] = $record['date_of_evaluation'];
			$rows[] = $record['date_of_sampling'];	
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
			$rows[] = $record['cell_line_name'];
			$rows[] = $record['cell_line_provenance'];		
			$rows[] = $record['CID'];	
			$rows[] = $record['cell_type'];
			$rows[] = $record['cell_line_organism'];	
			$rows[] = $record['passage_number'];		
			$rows[] = $record['modifications'];	
			$rows[] = $record['age'];
			$rows[] = $record['sex'];	
			$rows[] = $record['diagnosis'];		
			$rows[] = $record['sample_material'];	
			$rows[] = $record['date_of_evaluation'];
			$rows[] = $record['date_of_sampling'];	
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
			SET cell_line_name= ?, cell_line_provenance = ?, CID = ?, cell_type = ?, cell_line_organism = ?,
			    passage_number= ?, modifications = ?, age = ?, sex = ?, diagnosis = ?,
				sample_material= ?, date_of_evaluation = ?, date_of_sampling = ?
			WHERE id = ?");
	 
		   	$this->cell_line_name = htmlspecialchars(strip_tags($this->cell_line_name));
		   	$this->cell_line_provenance = htmlspecialchars(strip_tags($this->cell_line_provenance));
		   	$this->CID = htmlspecialchars(strip_tags($this->CID));
		   	$this->cell_type = htmlspecialchars(strip_tags($this->cell_type));
		   	$this->cell_line_organism = htmlspecialchars(strip_tags($this->cell_line_organism));
		   	$this->passage_number = htmlspecialchars(strip_tags($this->passage_number));
		   	$this->modifications = htmlspecialchars(strip_tags($this->modifications));
		   	$this->age = htmlspecialchars(strip_tags($this->age));
		   	$this->sex = htmlspecialchars(strip_tags($this->sex));
		   	$this->diagnosis = htmlspecialchars(strip_tags($this->diagnosis));
		   	$this->sample_material = htmlspecialchars(strip_tags($this->sample_material));
		   	$this->date_of_evaluation = htmlspecialchars(strip_tags($this->date_of_evaluation));
		   	$this->date_of_sampling = htmlspecialchars(strip_tags($this->date_of_sampling));
		   	$this->id = htmlspecialchars(strip_tags($this->id));
			
			
			$stmt->bind_param("sssssssssssssi", $this->cell_line_name, $this->cell_line_provenance, $this->CID,
                             			$this->cell_type, $this->cell_line_organism, $this->passage_number,
										$this->modifications, $this->age, $this->sex,
										$this->diagnosis, $this->sample_material, $this->date_of_evaluation,
										$this->date_of_sampling,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		
		if($this->cell_line_name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`session_id`,`file_name`,`cell_line_name`,`cell_line_provenance`,
			`CID`,`cell_type`,`cell_line_organism`,`passage_number`,`modifications` ,`age`,
			`sex`,`diagnosis`,`sample_material`,`date_of_evaluation`,`date_of_sampling`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		
		   	$this->cell_line_name = htmlspecialchars(strip_tags($this->cell_line_name));
		   	$this->cell_line_provenance = htmlspecialchars(strip_tags($this->cell_line_provenance));
		   	$this->CID = htmlspecialchars(strip_tags($this->CID));
		   	$this->cell_type = htmlspecialchars(strip_tags($this->cell_type));
		   	$this->cell_line_organism = htmlspecialchars(strip_tags($this->cell_line_organism));
		   	$this->passage_number = htmlspecialchars(strip_tags($this->passage_number));
		   	$this->modifications = htmlspecialchars(strip_tags($this->modifications));
		   	$this->age = htmlspecialchars(strip_tags($this->age));
		   	$this->sex = htmlspecialchars(strip_tags($this->sex));
		   	$this->diagnosis = htmlspecialchars(strip_tags($this->diagnosis));
		   	$this->sample_material = htmlspecialchars(strip_tags($this->sample_material));
		   	$this->date_of_evaluation = htmlspecialchars(strip_tags($this->date_of_evaluation));
		   	$this->date_of_sampling = htmlspecialchars(strip_tags($this->date_of_sampling));
		   	$this->filename = htmlspecialchars(strip_tags($this->filename));
			
			

			$stmt->bind_param("sssssssssssssss", $this->sid,$this->filename,$this->cell_line_name, $this->cell_line_provenance, $this->CID,
                            			$this->cell_type, $this->cell_line_organism,$this->passage_number,
										$this->modifications,$this->age,$this->sex,$this->diagnosis,
										$this->sample_material,$this->date_of_evaluation,$this->date_of_sampling);
										

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