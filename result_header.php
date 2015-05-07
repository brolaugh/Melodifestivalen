<?PHP
session_start();
	$_SESSION['active_page'] = 'result_box';
	header('Location:index.php');

?>