<?php
include_once 'database.php';
include_once 'classdivision.php';
$database = new Database();
$db = $database->getConnection();
$divisions = new Class_division($db);
 
    try{
    	$classinput=$_POST["param_class"];
        $totaldivs=$_POST["param_divi"];

        $i=1;
        for($d ='A';$i<=$totaldivs;$d=$d+1)
        {
                $divisions->class=$classinput;
                $divisions->division=$d;
                $divisions->classdiv=$classinput+$d;

                 if($divisions->create()){
                      $msg="Success";
           
                     }
                      // if unable to create , tell the user
                 else{
                     $msg= "Unable";
                    }
                    i=i+1;

        }
       // $msg=$classinput+''+$totaldivs;
        }
        
       
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        echo $msg;
    }
 
?>
