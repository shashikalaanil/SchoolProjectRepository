<?php

class Subject{
		//database connection and table name

private $conn;
private $table_name="subjects";

//object properties

public $subject_code;
public $subject_name;
public $subject_category;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query


	$query="INSERT INTO ". $this->table_name . "(subject_code,subject_name,subject_category) values(?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->subject_code);
	$stmt->bindParam(2,$this->subject_name);
	$stmt->bindParam(3,$this->subject_category);
	
	if($stmt->execute()){
		return true;
	}
	else{
		return false;
	}
}

//select all data
function readAll(){
	$query="SELECT * FROM ". $this->table_name;
	$stmt=$this->conn->query($query);
	$output=array();
	$output=$stmt->fetchall(PDO::FETCH_ASSOC);
	return $output;
}

}