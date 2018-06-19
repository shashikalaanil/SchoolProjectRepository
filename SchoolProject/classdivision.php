<?php

class Class_division{
	//database connection and table name

private $conn;
private $table_name="class_division";

//object properties

public $class;
public $division;
public $classdiv;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{
	$query="INSERT INTO ".$this->table_name. "(class,division,classdivision) values(?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->class);
	$stmt->bindParam(2,$this->division);
	$stmt->bindParam(3,$this->classdiv);
	
 	if($stmt->execute()){
		return "success";
	}
	else{
		return "fail";
	}
}
catch(Exception $ex){
	return $ex.errorMessage();
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

//update status of users
function updateStatus(){
	$query="UPDATE ". $this->table_name ." set status='D' where username=?";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->username);

	if($stmt->execute()){
		return true;
	}
	else{
		return false;
	}
}
}
?>