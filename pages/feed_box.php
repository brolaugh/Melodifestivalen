<?PHP 
	$result = mysqli_query($conn, "SELECT * FROM feed;");
	while($row = mysqli_fetch_row($result)){
?>
<div class="comment element">
	<p>
	<?PHP
		echo htmlspecialchars($row[2]." - ".$row[0] . " " . $row[1]);
	?>
	</p>
</div>

<?PHP 
	}
?>
<div>
	<form action="feed_add.php" method="post">
		<textarea maxlength="255" rows="5" required="required" name="feed_comment" cols="50" ></textarea>
		<br/>
		<input type="submit" value="Send comment!"/>
	</form>
</div>
