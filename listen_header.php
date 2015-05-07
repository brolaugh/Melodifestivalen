<?PHP
	session_start();
	$_SESSION['active_page'] = 'listen_box';
	header('Location:index.php');
?>