<?PHP
	require_once('db.php');
	$query = mysqli_query($conn, 'select artist from contestent;');
?>
<div id="vote_intro">
<h3>Ready to vote?</h3>
<p>Welcome to the vote page! You've got 10 votes all being worth differently but you can only give the same point once.</p>
</div>
<form action="vote.php"  onsubmit="return ok();" method="POST">
	<table style="width:100%" border="1">
	<tr>
		<th>0</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>5</th>
		<th>6</th>
		<th>7</th>
		<th>8</th>
		<th>10</th>
		<th>12</th>
	</tr>
<?PHP
	$counter = 0;
	for ($i=1; $i < 13; $i++) {	
		$artist = mysqli_fetch_row($query); 
		echo '<tr>' . "\n";
		for ($j=0; $j < 13; $j++) {
			if ($j == 9) {
				$j++;
			}
			if ($j == 11) {
				$j++;
			}
		echo "\t" . '<td><input type="radio" name="song' . $i . '" value="' . $j . '" required></td>' . "\n";


		}
		$counter++;
		echo "\t" . '<th>' . $artist[0] . '</th>' . "\n" .'</tr>' . "\n";
	}
?>
</table>
<input type="submit" value="Send Vote!">
</form>