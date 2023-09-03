<?php
			// MySQLi or PDO
	//CONNECT TO DATABASE
	$conn = mysqli_connect('localhost', 'Ruth', 'purityperfect@git7', 'users_info');
			//check connection
	if(!$conn){
		echo 'connection error: ' . mysqli_connect_error();
	}

?>