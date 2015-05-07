<?PHP
	require_once('db.php');
	$username = $_GET['username'];
	if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
		if (filter_var($_GET['email'], FILTER_SANITIZE_EMAIL)) {
			$email = $_GET['email'];
		}
		else{
			header('Location:index.php');
		}
	}
	else{
		header('Location:index.php');
	}
	$password =  md5($_GET['password']);
	$query_result= mysqli_query($conn, 'select email, username from user;');
	$username_taken = false;
	$email_taken = false;
	while($user = mysqli_fetch_row($query_result)){
		if ($user[0] == $email) {
			$email_taken = true;
		}
		if ($user[1] == $username) {
			$username_taken = true;
		}

	}
	if ($email_taken) {
		echo "emailen är tagen";
	}
	if ($username_taken) {
		echo "det namnet är taget";
	}
	if (!$email_taken || !$username_taken) {
		mysqli_query($conn,"INSERT INTO user(username, email, password) values('$username', '$email', '$password');");
		
	}
	header('location:index.php');

?>