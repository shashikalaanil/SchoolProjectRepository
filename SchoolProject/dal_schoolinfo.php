<?php
include_once 'database.php';
include_once 'school.php';
$database = new Database();
$db = $database->getConnection();
$school = new School($db);
 
    try{
    	$school->schoolname=$_POST["param_schoolname"];
    	$school->website=$_POST["param_website"];
    	$school->phone=$_POST["param_phone"];
        $school->alternatephone=$_POST["param_altphone"];
        $school->disecode=$_POST["param_disecode"];
        $school->schoolcode=$_POST["param_schoolcode"];
        $school->brcode=$_POST["param_brcode"];
        $school->brname=$_POST["param_brname"];
        $school->clustercode=$_POST["param_clustercode"];
        $school->clustername=$_POST["param_clustername"];
        $school->medium=$_POST["param_medium"];

        if($school->create()){
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
