<?php

class Fees_Details{
	//database connection and table name

private $conn;
private $table_name="fees_details";

//object properties

public $fees_slno;
public $fees_head;
public $fees_amount;


public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{
	$query="INSERT INTO ".$this->table_name. "(fees_slno,fees_head,fees_amount) values(?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->fees_slno);
	$stmt->bindParam(2,$this->fees_head);
	$stmt->bindParam(3,$this->fees_amount);
	
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