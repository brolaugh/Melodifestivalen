
<!DOCTYPE html>
<?PHP
	session_start();
	require_once("db.php");

?>

<html>
	<head>
		<meta charset="utf-8" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="less.css">
		<title>Melodifestivalen</title>
		<script type="text/javascript" src="javascript.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" href="stylesheets.css"/>
	</head>
	<body onload="<?PHP if(!isset($_SESSION['id'])){echo "ladda();";}?> ResUpdate();">
		<div id="wrapper">
		<header class="element">
			<img src="header.jpg">
			<div id="submenu">
				<a href="vote_header.php" <?php if (!isset($_SESSION['id'])){echo 'onclick="no_log();"';}?>><div class="menuButton">
					Vote
				</div>
				</a>
				<a href="listen_header.php"><div class="menuButton">
					Listen
				</div></a>
				<a href="result_header.php"><div class="menuButton">
					Results
				</div></a>
				<a href="feed_header.php"><div class="menuButton">
					Feed
				</div></a>
			</div>
		</header>
		<div id="body_container">
			<div id="main_container" class="element">
				<?PHP
				if(isset($_SESSION['id'])){
					if(!isset($_SESSION['active_page'])){
						include('pages/splash.php');
					}
					else{
						include 'pages/' . $_SESSION['active_page'] . '.php';
					}
				}
				else{
					include('pages/splash.php');
				}
        	?>
			</div>
			<div id="logIn" class="element">
				<?PHP if(!isset($_SESSION['id'])){
						include 'pages/login_box.php';
						include 'pages/regbox.php';
						}
					else{ ?>
					<h4>Welcome back!</h4>
					<br/>
				<form action="logout.php" method="post">
					<input type="submit" value="logout">
				</form>
				<?PHP } ?>

			</div>
		</div>
		</div>
	</body>
</html>