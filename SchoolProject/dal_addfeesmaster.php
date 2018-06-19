<?php
include_once 'database.php';
include_once 'feesmaster.php';
$database = new Database();
$db = $database->getConnection();
$fee = new Fees_master($db);
 
    try{
    	$fee->academicyear=$_POST["param_academicyear"];
    	$fee->class1=$_POST["param_class"];
    	$fee->category=$_POST["param_category"];
        $fee->fees=$_POST["param_fees"];
        
        if($fee->create()){
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
