<?php 

	 
	 	include_once 'database.php';
		include_once 'user.php';
		$database = new Database();
		$db = $database->getConnection();

		$users = new User($db);
		$result=$users->readAll();

		$data=array();
		
		while($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			array_push($data,$row);
			 
		}
		echo json_encode($data);
	?>
	 