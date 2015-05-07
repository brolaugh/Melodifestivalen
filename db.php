<?php
	$servername = "localhost";
	$username = "brolaugh_me";
	$password = "kattjävel5";
	$database = "brolaugh_melodifestivalen";
	$conn = mysqli_connect($servername, $username, $password, $database);
	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}