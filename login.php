
<?PHP
		session_start();
		require_once("db.php");

		$username = $_POST['username'];
		$password = md5($_POST['password']);
		if ($username && $password){
			$query_result = mysqli_query($conn, "select *from user where username='$username';");
			while($user = mysqli_fetch_row($query_result)){
			
			if ($password == $user[0]) {
				$_SESSION['id'] = $user[2];
				header('Location:index.php');
			}
			else{
				session_destroy();
				header('Location:index.php');
			}
		}
		}
		else{
			session_destroy();
			header('Location:index.php');
		}
		mysqli_close($conn);
?>