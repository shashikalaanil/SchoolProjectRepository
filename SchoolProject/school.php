<?php

class School{
	//database connection and table name

private $conn;
private $table_name="school_info";

//object properties

public $schoolname;
public $website;
public $phone;
public $alternatephone;
public $disecode;
public $schoolcode;
public $brcode;
public $brname;
public $clustercode;
public $clustername;
public $medium;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{
	$query="INSERT INTO ".$this->table_name. "(schoolname,website,phone,alternatephone,disecode,schoolcode,brcode,brname,clustercode,clustername,medium) values(?,?,?,?,?,?,?,?,?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->schoolname);
	$stmt->bindParam(2,$this->website);
	$stmt->bindParam(3,$this->phone);
	$stmt->bindParam(4,$this->alternatephone);
	$stmt->bindParam(5,$this->disecode);
	$stmt->bindParam(6,$this->schoolcode);
	$stmt->bindParam(7,$this->brcode);
	$stmt->bindParam(8,$this->brname);
	$stmt->bindParam(9,$this->clustercode);
	$stmt->bindParam(10,$this->clustername);
	$stmt->bindParam(11,$this->medium);

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