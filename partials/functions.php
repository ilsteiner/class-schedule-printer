<?php
	function getLists($filename, $delimiter=',') {
		if(!file_exists($filename) || !is_readable($filename)) {
			return FALSE;
		}
		
		$leaders = NULL;
		$classes = NULL;
		$class_leaders = NULL;
		$class_lists = array();
		$combined_lists = array();
		if (($handle = fopen($filename, 'r')) !== FALSE)
		{
			while (($row = fgetcsv($handle, 0, $delimiter)) !== FALSE)
			{
				if(!$leaders) {
					$leaders = $row;
				}
				elseif(!$classes) {
					$classes = $row;
					$class_leaders = array_combine($classes,$leaders);
				}
				else {
					$class_lists[] = array_combine($classes, $row);
				}
			}
			fclose($handle);
		}

		print_r($class_lists);

		foreach ($classes as $class) {
			$combined_lists[$class] = (object) 
				['name' => $class, 
				 'leader' => $class_leaders[$class],
				 'participants' => $class_lists[$class]
			    ];
		}

		return $combined_lists;
	}

	function getClasses($attendee,&$limitedEnrollment) {
		$classes = array();
		global $nameMap;

		$classes["name"] = $attendee->Name->FirstAndLast;
		$classes["time"] = $attendee->Timestamp;
		$classes["age"] = (isset($attendee->Fees->Age) ? $attendee->Fees->Age : null);

		// First period
		limitEnrollment($classes, $nameMap, $limitedEnrollment,
				[
					(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName1FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName1FirstPeriod : null),
					(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName2FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName2FirstPeriod : null),

					(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->Leader) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->Leader : null),
					(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->Leader2) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->Leader2 : null)
				],
				[
					(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName1FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName1FirstPeriod : null),
					(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName2FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName2FirstPeriod : null),

					(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->Leader) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->Leader : null),
					(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->Leader2) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->Leader2 : null)
				]
			);

			// Second period
			limitEnrollment($classes, $nameMap, $limitedEnrollment,
					[
						(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName1SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName1SecondPeriod : null),
						(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName2SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName2SecondPeriod : null),

						(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->Leader) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->Leader : null),
						(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->Leader2) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->Leader2 : null)
					],
					[
						(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName1SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName1SecondPeriod : null),
						(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName2SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName2SecondPeriod : null),

						(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->Leader) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->Leader : null),
						(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->Leader2) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->Leader2 : null)
					]
			);

			// Third period
			limitEnrollment($classes, $nameMap, $limitedEnrollment,
					[
						(isset($attendee->ClassRegistration->AfternoonPeriod[0]->ClassName1ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[0]->ClassName1ThirdPeriod : null),
						(isset($attendee->ClassRegistration->AfternoonPeriod[0]->ClassName2ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[0]->ClassName2ThirdPeriod : null),

						(isset($attendee->ClassRegistration->AfternoonPeriod[0]->Leader) ? $attendee->ClassRegistration->AfternoonPeriod[0]->Leader : null),
						(isset($attendee->ClassRegistration->AfternoonPeriod[0]->Leader2) ? $attendee->ClassRegistration->AfternoonPeriod[0]->Leader2 : null)
					],
					[
						(isset($attendee->ClassRegistration->AfternoonPeriod[1]->ClassName1ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[1]->ClassName1ThirdPeriod : null),
						(isset($attendee->ClassRegistration->AfternoonPeriod[1]->ClassName2ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[1]->ClassName2ThirdPeriod : null),

						(isset($attendee->ClassRegistration->AfternoonPeriod[1]->Leader) ? $attendee->ClassRegistration->AfternoonPeriod[1]->Leader : null),
						(isset($attendee->ClassRegistration->AfternoonPeriod[1]->Leader2) ? $attendee->ClassRegistration->AfternoonPeriod[1]->Leader2 : null)
					]
			);

		//Add to staff lists
		addToStaffLists($classes,$nameMap);

	    return $classes;
	}

	function addToStaffLists($classes,$nameMap) {
		global $staffLists;

		if(isset($classes[0])) {
			$staffLists[$classes[0]]["participants"][$classes["name"]]["time"] = $classes["time"];
			$staffLists[$classes[0]]["participants"][$classes["name"]]["age"] = $classes["age"];
			$staffLists[$classes[0]]["leader"] = $classes[1];
		}

		if(isset($classes[2])) {
			$staffLists[$classes[2]]["participants"][$classes["name"]]["time"] = $classes["time"];
			$staffLists[$classes[2]]["participants"][$classes["name"]]["age"] = $classes["age"];
			$staffLists[$classes[2]]["leader"] = $classes[3];
		}

		if(isset($classes[4])) {
			$staffLists[$classes[4]]["participants"][$classes["name"]]["time"] = $classes["time"];
			$staffLists[$classes[4]]["participants"][$classes["name"]]["age"] = $classes["age"];
			$staffLists[$classes[4]]["leader"] = $classes[5];
		}

		if(isset($classes[6])) {
			$staffLists[$classes[6]]["participants"][$classes["name"]]["time"] = $classes["time"];
			$staffLists[$classes[6]]["participants"][$classes["name"]]["age"] = $classes["age"];
			$staffLists[$classes[6]]["leader"] = $classes[7];
		}		
	}

	function limitEnrollment(&$classes, &$nameMap, &$limitedEnrollment,$firstChoices,$secondChoices) {
		if(checkPair($firstChoices,$limitedEnrollment)) {
			enrollPair($firstChoices, $nameMap, $classes, $limitedEnrollment);
		}

		else if(checkPair($secondChoices,$limitedEnrollment)) {
			enrollPair($secondChoices, $nameMap, $classes, $limitedEnrollment);
		}

		else {
			// Display error
			echo "No enrollment";
		}
	}

	// Adds classes to array for display and updates class limits
	function enrollPair($classPair, &$nameMap, &$classes, &$limitedEnrollment) {
		if($classPair[0] != null) {
			// Increment enrollment count
			incrementEnrollmentCount($limitedEnrollment,$classPair[0]);

			//Add to array
			array_push($classes,cleanName($classPair[0]),$classPair[2]);	

			//Add to name map
			$nameMap[cleanName($classPair[0])] = $classPair[0];
		}

		if($classPair[1] != null) {
			// Increment enrollment count
			incrementEnrollmentCount($limitedEnrollment,$classPair[1]);

			//Add to array
			array_push($classes,cleanName($classPair[1]),$classPair[3]);

			//Add to name map
			$nameMap[cleanName($classPair[1])] = $classPair[1];
		}
	}

	// Returns true if the pair is valid, false otherwise
	function checkPair($classPair, $limitedEnrollment) {
		// If there's no choice in the first slot
		// Or there is, but there's no limit problem
		if($classPair[0] == null || checkLimit($limitedEnrollment,$classPair[0])) {
			// If both slots are either null or have no limit issues
			if($classPair[1] == null || checkLimit($limitedEnrollment,$classPair[1])) {
				return true;
			}
		}

		// One of them had a problem
		return false;
	}

	function incrementEnrollmentCount(&$limitedEnrollment, $className) {
		$cleanName = cleanName($className);

		if(array_key_exists($cleanName, $limitedEnrollment)) {
			$limitedEnrollment[$cleanName]["enrolled"]++;
		}
	}

	function cleanName($className) {
		return strtolower(preg_replace("/[_\W]+/","-",preg_replace("/[()']+/","",$className)));
	}

	// Returns true if there is no limit or we're below it
	function checkLimit(&$limitedEnrollment,$className) {
		$cleanName = cleanName($className);

		// If the class has a limit
		if(array_key_exists($cleanName, $limitedEnrollment)) {
			// And the limit has not yet been reached
			if($limitedEnrollment[$cleanName]["enrolled"] < $limitedEnrollment[$cleanName]["limit"]) {
				return true;
			}

			// But the limit has been reached
			return false;
		}

		// There is no limit for this class
		return true;
	}

	function insertClass(&$classes,$classSelector,$priority) {
		if(isset($classSelector)) {
			$classes[strtolower(preg_replace("/[_\W]+/","-",preg_replace("/[()']+/","",$classSelector)))] = $priority;
		}
	}

	function getLimitedClasses($limits) {
		$limitedClasses = array();
		foreach ($limits["class-limits"] as $className => $limit) {
			if($limit > 0) {
				$limitedClasses[$className]["limit"] = $limit;
				$limitedClasses[$className]["enrolled"] = 0;
			}
		}

		return $limitedClasses;
	}

	function atLimit($className) {
		global $limitedEnrollment;
		return (isset($limitedEnrollment[$className]) ? $limitedEnrollment[$className]["enrolled"] >= $limitedEnrollment[$className]["limit"] : false);
	}