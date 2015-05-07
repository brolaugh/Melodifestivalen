<?PHP
	session_start();
	$_SESSION['active_page'] = 'feed_box';
	header('Location:index.php');

?>