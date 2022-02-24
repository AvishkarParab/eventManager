<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'Avishkar', 'kiI*vnzrUCI[L(WB', 'eventdb');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>