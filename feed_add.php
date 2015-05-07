<?PHP
	session_start();
	require_once('db.php');
	$message = $_REQUEST['feed_comment'];
	mysqli_query($conn,"INSERT INTO feed(id,message) values('" . $_SESSION['id']  . "','" . $message . "');");
	$_SESSION['active_page'] = 'feed_box';
	header('location:index.php');
	//echo "BBBBBxxx".$_SESSION['id'];
?>

