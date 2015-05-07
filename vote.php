<?PHP 
	session_start();
		require_once('db.php');
		$votecount = 0;
	for ($i=1; $i < 13; $i++) { 
		$votes[$i] =$_REQUEST['song' . $i];	
		$votecount+= $votes[$i];
	}
	if ($votecount != 58) {
		echo $votecount . " fly you fools";
	}

	else{
		mysqli_query($conn, "ALTER TABLE votes DROP COLUMN where voter='".$_SESSION['id']."';");
		mysqli_query($conn, "insert into votes values('" . $_SESSION['id'] . "', '" . $votes[1] . "', '" . $votes[2] . "', '" . $votes[3] . "', '" . $votes[4] . "', '" . $votes[5] . "', '" . $votes[6] . "', '" . $votes[7] . "', '" . $votes[8] . "', '" . $votes[9] . "', '" . $votes[10] . "', '" . $votes[11] . "', '" . $votes[12] . "');");
		$_SESSION['active_page'] = 'listen_box';
		header('location:index.php');
	}
?>