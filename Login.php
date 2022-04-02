<?php

    //Code to solve CORS policy error
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    $postData = file_get_contents("php://input");
	require 'database.php';
    
    try
    {
	  
	  if(isset($postData) && !empty($postData)){
		
		$request = json_decode($postData);
		// Insert  '$request'
      $sql = "SELECT * FROM users WHERE name = '$request->username' and password = '$request->password'";
	  
		if($result = mysqli_query($con, $sql))
        {
           $i = 0;
			$row = mysqli_fetch_assoc($result);

			$counter[$i]['User_Id']    = $row['id'];
			$counter[$i]['Name'] = $row['name'];
			$counter[$i]['Role_Id'] = $row['role_id'];
			$counter[$i]['scopeofwrk'] = $row['scopeofwrk'];
 
			echo json_encode($counter);
        }
	  
	  }
		else
        {
          echo json_encode(0);
        }         
        
    }      
    catch (Exception $e) 
        {
            echo json_encode($e);
        }

?>