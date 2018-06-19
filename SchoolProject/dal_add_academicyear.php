<?php
include_once 'database.php';
include_once 'academicyear.php';
$database = new Database();
$db = $database->getConnection();
$acad = new Academic_year($db);
 
    try{
    	$acad->academicyear=$_POST["param_academicyear"];
    	$acad->startdate=$_POST["param_startdate"];
    	$acad->enddate=$_POST["param_enddate"];
        
        if($acad->create()){
            $msg="Success";
           
        }
    // if unable to create , tell the user
    else{
         $msg= "Unable";
        }
    }
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        echo $msg;
    }
 
?>
