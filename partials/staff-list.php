<div class="staff-list-wrapper">
	<?php
	foreach ($lists["staff_lists"] as $list) {
		echo "<div class='staff-list'>";
			echo "<div class='staff-list-header'>";
				echo "<div class='class-name'>" . $list->name . "</div>";
				echo "<div class='leader-name'>" . $list->leader . "</div>";
				echo "<div class='count" . (atLimit($className) ? " limit" : "") . "'>" . count($list["participants"]) . "</div>";
			echo "</div>";
			echo "<div class='participants'>";
				foreach ($list->participants as $participant => $pData) {
					echo "<div class='participant'>";
						echo "<div class='participant-name'>" . $participant . "</div>";
					echo "</div>";
				}
			echo "</div>";
		echo "</div>";
	}
	?>
</div>
