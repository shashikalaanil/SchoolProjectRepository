<?php
include_once 'database.php';
include_once 'feesdetails.php';
$database = new Database();
$db = $database->getConnection();
$fees = new Fees_Details($db);
 
    try{
    	$fees->fees_slno=$_POST["param_slno"];
    	$fees->fees_head=$_POST["param_head"];
    	$fees->fees_amount=$_POST["param_amount"];
        
        if($fees->create()){
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
