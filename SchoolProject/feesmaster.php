<?php

class Fees_master{
	//database connection and table name

private $conn;
private $table_name="fees_master";

//object properties

public $slno;
public $academicyear;
public $class1;
public $category;
public $fees;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{

	$this->autogen();
	$query="INSERT INTO ".$this->table_name. "(fees_slno,academicyear,class,category,totalfees) values(?,?,?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->slno);
	$stmt->bindParam(2,$this->academicyear);
	$stmt->bindParam(3,$this->class1);
	$stmt->bindParam(4,$this->category);
	$stmt->bindParam(5,$this->fees);

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

//autogeneration
function autogen(){
	$query="select count(fees_slno) as c, max(fees_slno) as m from ".$this->table_name;
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$this->countrows=$row['c'];
	if($this->countrows==0)
		$this->slno=1;
	else{
		$this->slno=$row['m'];
		$this->slno++;
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