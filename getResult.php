<?PHP
	include_once('db.php');
	$query_result = mysqli_query($conn, "SELECT sum( Song1 ) AS song1, sum( Song2 ) AS song2, sum( Song3) AS song3, sum( Song4) AS song4, sum( Song5) AS song5, sum( Song6) AS song6, sum( Song7) AS song7, sum( Song8) AS song8, sum( Song9) AS song9, sum( Song10) AS song10, sum( Song11) AS song11, sum( Song12) AS song12 FROM votes ;");
			
	$row = mysqli_fetch_row($query_result);
	for ($r=0; $r < 12; $r++) {
		echo $row[$r].",";
		
	}

		echo "*";
	$query_result = mysqli_query($conn," SELECT concat( '(', artist, ') ', song_name ) AS bidrag FROM contestent ORDER BY songID ;");
			
	while($row = mysqli_fetch_row($query_result))
	{
		echo $row[0].",";
		
	}

	

?>