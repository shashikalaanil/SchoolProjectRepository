<?php
include_once 'database.php';
include_once 'subject.php';

$database=new Database();
$db=$database->getConnection();

//create Subject object
$subject=new Subject($db);

//fetch html input
 try{
    	$subject->subject_code=$_POST["param_subjectcode"];
    	$subject->subject_name=$_POST["param_subjectname"];
    	$subject->subject_category=$_POST["param_subjectcat"];
    	
    	if($subject->create()){
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