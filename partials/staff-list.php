<?php
	uasort($staffLists, function($a, $b) {
		if(isset($a) && isset($b)) {
			return strcmp($a['leader'],$b['leader']);
		}
		if(!isset($a) && isset($b)) {
			return -1;
		}
		if(isset($a) && !isset($b)) {
			return 1;
		}
		return 0;
	});
?>

<div class="staff-list-wrapper">
	<?php
	foreach ($staffLists as $className => $data) {
		echo "<div class='staff-list'>";
			echo "<div class='staff-list-header'>";
				echo "<div class='class-name'>" . $nameMap[$className] . "</div>";
				echo "<div class='leader-name'>" . $data["leader"] . "</div>";
			echo "</div>";
			echo "<div class='participants'>";
				foreach ($data["participants"] as $participant => $time) {
					echo "<div class='participant'>";
						echo "<div class='participant-name'>" . $participant . "</div>";
						echo "<div class='registration-time' title='Timezone:  " .
								date("T, P", $time) .
								"'>" .
								"<span class='reg-date'>" . date("m/d/y", $time) . "</span>" .
								"<span class='reg-time'>" . date("g:i", $time) . "</span>" .
								"<span class='reg-ampm'>" . date("A", $time) . "</span>" .
							"</div>";
					echo "</div>";
				}
			echo "</div>";
		echo "</div>";
	}
	?>
</div>
