<h3>The competing!</h3>
				<br/>
				<?PHP
				$query_result = mysqli_query($conn, 'select *from contestent;');
				$breaker = 3;

				while ($contestent = mysqli_fetch_row($query_result)){
					echo '<div class="contestent" id="song'.$contestent[0].'" onclick="Merge();">';
					$arraylink =  explode('?v=',$contestent[3]);
					echo '<h4>' . $contestent[1] . " - " . $contestent[2] . '</h4>';
				?>
				<div class="ContImage">
					<a target="_blank" href="<?PHP echo $contestent[3]; ?>">
						<img src="http://img.youtube.com/vi/<?PHP echo $arraylink[1]; ?>/hqdefault.jpg">
					</a>
					<!--<p>nån gång i framtiden kommer det vara någon viktig text här men den är inte inlagd än så du får nöja dig med denna hund istället </p> -->
					<!--<img id="hund" src="http://25.media.tumblr.com/a057dfb6d795792076571ae00f972506/tumblr_mmfwdqRCK11rcl9fxo1_500.gif">-->
				</div>
				<?PHP
					echo '</div>';
				}
				?>