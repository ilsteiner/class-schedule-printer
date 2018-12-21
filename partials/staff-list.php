<div class="staff-list-wrapper">
	<?php
	foreach ($by_class[0] as $className => $data) {
		echo "<div class='staff-list'>";
			echo "<div class='staff-list-header'>";
				echo "<div class='class-name'>" . $className . "</div>";
				echo "<div class='leader-name'>" . $data->Leader . "</div>";
				echo "<div class='count" . ($data->Limit != 0 && $data->Count >= $data->Limit ? " limit" : "") . "'>" . $data->Count . "</div>";
			echo "</div>";
			echo "<div class='participants'>";
				foreach ($data->Registrants as $participant => $pData) {
					$time = $pData->Timestamp;
					echo "<div class='participant'>";
						echo "<div class='participant-name'>" . $pData->Name . (isset($pData->Age) ? "<span class='age'>" . $pData->Age . "</span>" : "") . "</div>";
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

	foreach ($by_class[1] as $className => $data) {
		echo "<div class='staff-list'>";
			echo "<div class='staff-list-header'>";
				echo "<div class='class-name'>" . $className . "</div>";
				echo "<div class='leader-name'>" . $data->Leader . "</div>";
				echo "<div class='count" . ($data->Limit != 0 && $data->Count >= $data->Limit ? " limit" : "") . "'>" . $data->Count . "</div>";
			echo "</div>";
			echo "<div class='participants'>";
				foreach ($data->Registrants as $participant => $pData) {
					$time = $pData->Timestamp;
					echo "<div class='participant'>";
						echo "<div class='participant-name'>" . $pData->Name . (isset($pData->Age) ? "<span class='age'>" . $pData->Age . "</span>" : "") . "</div>";
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

	foreach ($by_class[2] as $className => $data) {
		echo "<div class='staff-list'>";
			echo "<div class='staff-list-header'>";
				echo "<div class='class-name'>" . $className . "</div>";
				echo "<div class='leader-name'>" . $data->Leader . "</div>";
				echo "<div class='count" . ($data->Limit != 0 && $data->Count >= $data->Limit ? " limit" : "") . "'>" . $data->Count . "</div>";
			echo "</div>";
			echo "<div class='participants'>";
				foreach ($data->Registrants as $participant => $pData) {
					$time = $pData->Timestamp;
					echo "<div class='participant'>";
						echo "<div class='participant-name'>" . $pData->Name . (isset($pData->Age) ? "<span class='age'>" . $pData->Age . "</span>" : "") . "</div>";
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
