<?PHP
	session_start();
	$_SESSION['active_page'] = 'vote_box';
	header('Location:index.php');
?>