<?php
$username = $_POST["username"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "j528v812", "yiesah7a", "j528v812");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
	if (empty($username))
	{
		echo "Please input a username";
	}
	else 
	{
        $query = "SELECT * FROM Users WHERE user_id='$username';";
		if ($entity = $mysqli->query($query)) 
		{
   			if($row = $entity->fetch_assoc()) 
			{    
                echo "Username already exists. Try Again";
    		}
    		else
			{
                $userAdd = "INSERT INTO Users (user_id) VALUES ('$username');";
                $mysqli->query($userAdd);
                echo "User Added";
    		}
    		$entity->free();
		}
    }
}
$mysqli->close();
?>