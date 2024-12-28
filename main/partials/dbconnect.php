<?php

	$conn = mysqli_connect("localhost", "root", "", "user");
	if($conn)
	{
		echo " ";
	}
	else
	{
		die("Error". mysqli_connect_error());
	}

?>