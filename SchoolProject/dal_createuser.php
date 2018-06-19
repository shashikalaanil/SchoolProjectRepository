<?php
include_once 'database.php';
include_once 'user.php';
$database = new Database();
$db = $database->getConnection();
$users = new User($db);
 
    try{
    	$users->username=$_POST["param_username"];
    	$users->password=$_POST["param_pwd"];
    	$users->usertype=$_POST["param_usertype"];
        $users->name=$_POST["param_name"];
        $users->status=$_POST["param_status"];
        if($users->create()){
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
