<?php
$user_name = $_POST["users"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "j528v812", "yiesah7a", "j528v812");
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
	$query = "SELECT content FROM Posts WHERE author_id='$user_name';";
	echo "<table>";
	echo "<table border=\"3\">";	
	if ($entity = $mysqli->query($query)) 
	{
  		echo ('<tr>');
    			while ($row = $entity->fetch_assoc()) 
			{
        			echo ('<td><center>'.$row["content"].'</td>');
       				echo ('</tr>');
    			}
    			$entity->free();
	}
}
$mysqli->close();
?>

